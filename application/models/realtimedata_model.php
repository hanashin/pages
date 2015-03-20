<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realtimedata_model extends CI_Model {

    public $pdo;

    public function __construct() 
    {
        parent::__construct();
        $dsn = 'sqlite:'.APPPATH.'../../../database.db';
        $this->pdo = new PDO($dsn);          
    }

    public function get_data()
    {
        $curdata = array();
        $num = 0;
        $fp = @fopen("/tmp/parameters.conf",'r');
        if ($fp)
        {
            while(!feof($fp))
            {
                $record = fgets($fp);
                if(strlen($record) > 1)
                {
                    sscanf($record, "%[^,],%[^,],%[^,],%[^,],%[^,],%[^,]",$curdata[$num][0], $curdata[$num][1], $curdata[$num][2], $curdata[$num][3], $curdata[$num][4], $curdata[$num][5]);
                    $num++;
                }
            }
            fclose($fp);
        }
        $data['curdata'] = $curdata;
      
        return $data;
    }

    //获取发电功率
    public function get_power_graph() 
    {
        $power = array();
        $data['today_energy'] = "0";

        //读取当前时区
        $timezone = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp)
        {
          $timezone = fgets($fp);
          fclose($fp);
        }
        date_default_timezone_set($timezone);

        //获取选择日期（默认为今天）
        $date = date("Y-m-d",time());
        if(strlen($this->input->post('date')))
            $date = $this->input->post('date');
        sscanf($date, "%d-%d-%d", $year, $month, $day);
        $query_date = sprintf("%04d%02d%02d", $year, $month, $day);

        //获取数据
        $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
        $this->pdo = new PDO($dsn);
        $query = "SELECT time,each_system_power FROM each_system_power WHERE date=$query_date";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {
            $result->execute();
            $res = $result->fetchAll();
            foreach ($res as $key => $value) {
                $power[$key]['time'] = strtotime($query_date.$value['time'])*1000;
                $power[$key]['each_system_power'] = intval($value['each_system_power']);
            }
        }
        $query = "SELECT daily_energy FROM daily_energy WHERE date=$query_date";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {
            $result->execute();
            $res = $result->fetchAll();
            if(!empty($res))
                $data['today_energy'] = number_format(floatval($res[0][0]), 2);//保留两位小数
        }

        //将数据赋值到data数组传给控制器
        $data['power'] = $power;
        $data['date'] = $date;

        return $data;
    }

    //获取发电能量
    public function get_energy_graph() 
    {
        $energy = array();

        //读取当前时区
        $timezone = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp)
        {
          $timezone = fgets($fp);
          fclose($fp);
        }
        date_default_timezone_set($timezone);

        //获取选择日期（默认为今天）
        $date = date("Y-m-d",time());
        if(strlen($this->input->post('date')))
            $date = $this->input->post('date');

        //获取周期
        $period = "weekly";
        if(strlen($this->input->post('period')))
            $period = $this->input->post('period');

        //按周期获取数据
        if(!strncmp($period, "weekly", 6))
        {
            //计算起止时间
            $data_start = date("Y-m-d",strtotime($date)-3600*24*6)."\n";
            sscanf($data_start, "%d-%d-%d", $year, $month, $day);
            $query_date_start = sprintf("%04d%02d%02d", $year, $month, $day);//开始时间
            sscanf($date, "%d-%d-%d", $year, $month, $day);
            $query_date_end = sprintf("%04d%02d%02d", $year, $month, $day);//结束时间

            //初始化数据(先赋值为0)
            $energy = array();
            for ($i=6; $i >= 0; $i--) 
            {
                $energy[6-$i]['date'] = date("Y-m-d", strtotime($date)-$i*3600*24);
                sscanf($energy[6-$i]['date'], "%d-%d-%d", $year, $month, $day);
                $energy[6-$i]['date'] = sprintf("%04d%02d%02d", $year, $month, $day);
                $energy[6-$i]['energy'] = 0;
            }

            //获取数据
            $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
            $this->pdo = new PDO($dsn);
            $query = "SELECT date,daily_energy FROM daily_energy WHERE date BETWEEN $query_date_start AND $query_date_end";
            $result = $this->pdo->prepare($query);
            if(!empty($result))
            {
                $result->execute();
                $res = $result->fetchAll();
                $flag_end = count($res);
                $flag_start = 0;
                foreach ($energy as $key => $value) 
                {                
                    for ($i=$flag_start; $i < $flag_end ; $i++) 
                    { 
                        if(!strncmp($value['date'], $res[$i]['date'], 8))
                        {
                            $energy[$key]['energy'] = number_format(floatval($res[$i]['daily_energy']), 2);
                            $flag_start++;
                            break;
                        }
                    }
                    sscanf($energy[$key]['date'], "%04d%02d%02d", $year, $month, $day);
                    $energy[$key]['date'] = sprintf("%02d/%02d", $month, $day);
                }
            }
        }
        else if(!strncmp($period, "monthly", 7))
        {
            //计算起止时间
            $data_start = date("Y-m-d",strtotime($date)-3600*24*29)."\n";
            sscanf($data_start, "%d-%d-%d", $year, $month, $day);
            $query_date_start = sprintf("%04d%02d%02d", $year, $month, $day);
            sscanf($date, "%d-%d-%d", $year, $month, $day);
            $query_date_end = sprintf("%04d%02d%02d", $year, $month, $day);

            //初始化数据(先赋值为0)
            $energy = array();
            for ($i=29; $i >= 0; $i--) 
            {
                $energy[29-$i]['date'] = date("Y-m-d", strtotime($date)-$i*3600*24);
                sscanf($energy[29-$i]['date'], "%d-%d-%d", $year, $month, $day);
                $energy[29-$i]['date'] = sprintf("%02d%02d", $month, $day);
                $energy[29-$i]['energy'] = 0;
            }

            //获取数据
            $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
            $this->pdo = new PDO($dsn);
            $query = "SELECT date,daily_energy FROM daily_energy WHERE date BETWEEN $query_date_start AND $query_date_end";
            $result = $this->pdo->prepare($query);
            if(!empty($result))
            {
                $result->execute();
                $res = $result->fetchAll();
                $flag_end = count($res);
                $flag_start = 0;
                foreach ($energy as $key => $value) 
                {                
                    for ($i=$flag_start; $i < $flag_end ; $i++) 
                    { 
                        if(!strncmp($value['date'], substr($res[$i]['date'], 4), 4))
                        {
                            $energy[$key]['energy'] = number_format(floatval($res[$i]['daily_energy']), 2);
                            $flag_start++;
                            break;
                        }
                    }
                    sscanf($energy[$key]['date'], "%02d%02d", $month, $day);
                    $energy[$key]['date'] = sprintf("%02d/%02d", $month, $day);
                }
            }
        }
        else if(!strncmp($period, "yearly", 6))
        {
            //计算起止时间
            sscanf($date, "%d-%d-%d", $year, $month, $day);
            $query_date_end = sprintf("%04d%02d", $year, $month);
            if($month == 12)
                $query_date_start = sprintf("%04d01", $year);
            else
                $query_date_start = sprintf("%04d%02d", $year-1, $month+1);

            //初始化数据(先赋值为0)
            $energy = array();
            for ($i=0; $i < 12; $i++) 
            {
                if($month == 0)
                {
                   $year--;
                   $month = 12;
                }                                  
                $energy[$i]['date'] = sprintf("%04d%02d", $year, $month--);
                $energy[$i]['energy'] = 0;
            }
            $energy = array_reverse($energy);//将数组倒序

            //获取数据
            $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
            $this->pdo = new PDO($dsn);
            $query = "SELECT date,monthly_energy FROM monthly_energy WHERE date BETWEEN $query_date_start AND $query_date_end";
            $result = $this->pdo->prepare($query);
            if(!empty($result))
            {
                $result->execute();
                $res = $result->fetchAll();
                $flag_end = count($res);
                $flag_start = 0;
                foreach ($energy as $key => $value) 
                {                
                    for ($i=$flag_start; $i < $flag_end; $i++) 
                    { 
                        if(!strncmp($value['date'], $res[$i]['date'], 6))
                        {
                            $energy[$key]['energy'] = number_format(floatval($res[$i]['monthly_energy']), 2);
                            $flag_start++;
                            break;
                        }
                    }
                    sscanf($energy[$key]['date'], "%04d%02d", $year, $month);
                    $energy[$key]['date'] = sprintf("%04d/%02d", $year, $month);
                }
            }
        }

        //求一个周期内的总发电量
        $total = 0;
        foreach ($energy as $key => $value) {
              $total = $total + $value['energy'];
        }

        //将数据赋值到data数组传给控制器
        $data['energy'] = $energy;
        $data['date'] = $date;
        $data['period'] = $period;
        $data['total'] = $total;

        return $data;
    }

    //获取逆变器工作状态
    public function get_inverter_status()
    {
       $temp = array();

        $query = "SELECT id FROM id";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {
            $result->execute();
            $res = $result->fetchAll();
            foreach ($res as $key => $value) {
                $temp[$key] = $value[0];
            }
        }
        
        $data['ids'] = $temp;
      
        return $data;
    }
}


/* End of file realtimedata_model.php */
/* Location: ./application/models/realtimedata_model.php */