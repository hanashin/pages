<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidden_model extends CI_Model {

    public $pdo;

    public function __construct() 
    {
        parent::__construct();
        $dsn = 'sqlite:'.APPPATH.'../../../database.db';
        $this->pdo = new PDO($dsn);          
    }

    /* 执行DEBUG操作 */
    public function exec_command() 
    {
        $result = "";

        $cmd = $this->input->post('command');

        if(strlen($cmd))
        {
            echo "<!--";
            system($cmd, $result);
            echo "-->";
        }
        else
            $result = "empty";

        $data['result'] = $result;
      
        return $data;
    }

    /* 获取导出数据的起止时间 */
    public function get_export_time()
    {
        $data = array();
        //读取当前时区
        $fp = fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp)
        {
          $timezone = fgets($fp);
          fclose($fp);
        }
        date_default_timezone_set($timezone);
        $data['start_time'] = date("Y-m-d H:i:s",time()-3600*12)."\n";
        $data['end_time'] = date("Y-m-d H:i:s",time());

        return $data;
    }

    /* 执行导出数据操作 */
    public function exec_export_file()
    {
        $data = array();

        //获取起止时间
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        sscanf($start_time, "%d-%d-%d %d:%d:%d", $year, $month, $day, $hour, $minute, $second);
        $start = sprintf("%04d%02d%02d%02d%02d%02d", $year, $month, $day, $hour, $minute, $second);
        sscanf($end_time, "%d-%d-%d %d:%d:%d", $year, $month, $day, $hour, $minute, $second);
        $end = sprintf("%04d%02d%02d%02d%02d%02d", $year, $month, $day, $hour, $minute, $second);

        $title = array(
                    'Inverter ID',
                    'Channel',
                    'DC voltage',
                    'DC current',
                    'Power',
                    'Grid frequency',
                    'Temperature',
                    'Grid voltage',
                    'Energy',
                    'Report date and time'
                );

        //获取数据
        $dsn = 'sqlite:'.APPPATH.'../../../record.db';
        $this->pdo = new PDO($dsn);
        $query = "SELECT record FROM data WHERE date_time BETWEEN $start AND $end";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {
            $result->execute();
            $res = $result->fetchAll();

            $count = 0;
            foreach ($res as $key => $value) {
                //支持版本:APS11,ASP12,APS13
                if(!strncmp($value['record'], "APS11", 5) || !strncmp($value['record'], "APS12", 5) || !strncmp($value['record'], "APS13", 5))
                {
                    $num = (strlen($value['record'])-87)/57;
                    for ($i=0; $i<$num; $i++) {

                        $temp = substr($value['record'], 86+57*$i, 57);
                        $data[$count]['inverter_id'] = strval(substr($temp, 0, 12));
                        $data[$count]['channel'] = substr($temp, 12, 1);

                        //将A替换为0
                        $temp = str_replace("A", "0", $temp);

                        $data[$count]['dc_voltage'] = number_format(floatval(substr($temp, 13, 5)/10), 1);
                        $data[$count]['dc_current'] = number_format(floatval(substr($temp, 18, 3)/10), 1);
                        $data[$count]['power'] = number_format(floatval(substr($temp, 21, 5)/100), 2);
                        $data[$count]['grid_frequency'] = number_format(floatval(substr($temp, 26, 5)/10), 1);

                        if(!strncmp(substr($temp, 31, 1), "B", 1))
                            $data[$count]['temperature'] = "-".intval(substr($temp, 32, 2));
                        else
                            $data[$count]['temperature'] = intval(substr($temp, 31, 3));

                        $data[$count]['grid_voltage'] = intval(substr($temp, 34, 3));
                        $data[$count]['energy'] = number_format(floatval(substr($temp, 48, 6)/1000000), 6);
                        $data[$count]['datetime'] = substr($value['record'], 60, 4)."/".
                                                    substr($value['record'], 64, 2)."/".
                                                    substr($value['record'], 66, 2)." ".
                                                    substr($value['record'], 68, 2).":".
                                                    substr($value['record'], 70, 2).":".
                                                    substr($value['record'], 72, 2);
                        $count++;
                    }      
                }
            }
        }   

        //将数据通过csv文件形式进行下载
        header("Content-Type: application/octet-stream");  
        header("Content-Disposition: attachment; filename=historical_data($start_time - $end_time).csv");  
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');  
        header('Expires:0');  
        header('Pragma:public');
        //标题  
        foreach ($title as $value) {
            echo $value.",";
        }
        echo "\n";
        //数据
        foreach ($data as $record) {
            foreach ($record as $value) {
                echo $value.",";
            }
            echo "\n";
        }
    }

    /* 显示自动更新的服务器的地址和端口 */
    public function get_updatecenter()
    {
        $data = array();
        $data['domain'] = "";
        $data['ip'] = "";
        $data['port'] = "";

        $fp = fopen("/etc/yuneng/updatecenter.conf", 'r');
        if($fp)
        {
            while(!feof($fp))
            {
                $temp = fgets($fp);
                if(!strncmp($temp, "Domain", 6))
                    $data['domain'] = substr($temp, 7);
                if(!strncmp($temp, "IP", 2))
                    $data['ip'] = substr($temp, 3);
                if(!strncmp($temp, "Port", 4))
                    $data['port'] = substr($temp, 5);
            }
            fclose($fp);
        }

        return $data;
    }

    /* 设置自动更新的服务器的地址和端口 */
    public function set_updatecenter()
    {
        $data = array();

        //获取Updatecenter的信息
        $domain = $this->input->post('domain');
        $ip = $this->input->post('ip');
        $port = $this->input->post('port');

        $fp = fopen("/etc/yuneng/updatecenter.conf", 'w');
        fwrite($fp, "Domain=".$domain."\n");
        fwrite($fp, "IP=".$ip."\n");
        fwrite($fp, "Port=".$port."\n");
        fclose($fp);

        system("killall autoupdate");
        system("killall single_update");

        $data['result'] = "success";

        return $data;
    }
        

    /* 显示EMA的地址和端口 */
    public function get_datacenter()
    {
        $data = array();

        $data['domain'] = "";
        $data['ip'] = "";
        $data['port1'] = "";
        $data['port2'] = "";

        $fp = fopen("/etc/yuneng/datacenter.conf", 'r');
        if($fp)
        {
            while(!feof($fp))
            {
                $temp = fgets($fp);
                if(!strncmp($temp, "Domain", 6))
                    $data['domain'] = substr($temp, 7);
                if(!strncmp($temp, "IP", 2))
                    $data['ip'] = substr($temp, 3);
                if(!strncmp($temp, "Port1", 5))
                    $data['port1'] = substr($temp, 6);
                if(!strncmp($temp, "Port2", 5))
                    $data['port2'] = substr($temp, 6);
            }
            fclose($fp);
        }

        return $data;
    }

    /* 设置EMA的地址和端口 */
    public function set_datacenter()
    {
        $data = array();

        //获取Datacenter的信息
        $domain = $this->input->post('domain');
        $ip = $this->input->post('ip');
        $port1 = $this->input->post('port1');
        $port2 = $this->input->post('port2');

        $fp = fopen("/etc/yuneng/datacenter.conf", 'w');
        if($fp)
        {
            fwrite($fp, "Domain=".$domain."\n");
            fwrite($fp, "IP=".$ip."\n");
            fwrite($fp, "Port1=".$port1."\n");
            fwrite($fp, "Port2=".$port2."\n");
            fclose($fp);
        }

        system("killall client");

        $data['result'] = "success";

        return $data;
    }


    /* 执行初始化操作 */
    public function exec_initialize()
    {
        $result = 0;

        system("killall main.exe");
        $this->pdo->exec("UPDATE ltpower SET power=0.0 WHERE item =1");
        $this->pdo->exec("DELETE FROM tdpower");

        $data['result'] = $result;
      
        return $data;
    }

    /* 显示串口信息 */
    public function get_serial()
    {
        //初始化串口信息
        $data['serial_switch'] = "off";
        $data['baud_rate'] = "9600";
        $data['ecu_address'] = "8";
        $fp = fopen("/etc/yuneng/serial.conf", 'r');
        if($fp)
        {
            $data['serial_switch'] = fgets($fp);
            $data['baud_rate'] = fgets($fp);
            $data['ecu_address'] = fgets($fp);
            fclose($fp);
        }

        return $data;
    }

    /* 设置串口信息 */
    public function set_serial()
    {
        $data = array();
        $data['result'] = "";

        //获取页面输入的串口信息
        $serial_switch = $this->input->post('serial_switch');
        $baud_rate = $this->input->post('baud_rate');
        $ecu_address = intval($this->input->post('ecu_address'));
        if($ecu_address>0 && $ecu_address<128)
        {
            $fp = fopen("/etc/yuneng/serial.conf", 'w');
            if($fp)
            {
                fwrite($fp, $serial_switch."\n");
                fwrite($fp, $baud_rate."\n");
                fwrite($fp, $ecu_address);
                fclose($fp);

                $data['result'] = "success";
            }
        }

        return $data;
    }

}


/* End of file hidden_model.php */
/* Location: ./application/models/hidden_model.php */