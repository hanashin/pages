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
        /* 初始化 */
        $data = array(
            'curdata' => array()
        );
        $ids = array();
//         $curdata = array();
//         $num = 0;
//         //$fp = @fopen("/tmp/optimizer_last_data.txt", 'r');
//         $fp = @fopen(APPPATH."../../../optimizer_last_data.txt", 'r');
//         if ($fp)
//         {
//             while(!feof($fp))
//             {
//                 $record = fgets($fp);
//                 if(strlen($record) > 1)
//                 {
//                     sscanf($record, "%[^,],%[^,],%[^,],%[^,],%[^,],%[^,],%[^,],%[^,],%[^,],%[^,],%[^,]",
//                     $curdata[$num][0], $curdata[$num][1], $curdata[$num][2], 
//                     $curdata[$num][3], $curdata[$num][4], $curdata[$num][5],
//                     $curdata[$num][6], $curdata[$num][7], $curdata[$num][8],
//                     $curdata[$num][9], $curdata[$num][10]);
//                     $num++;
//                 }
//             }
//             fclose($fp);
//         }
//         $data['curdata'] = $curdata;

        //获取优化器ID
        $query = "SELECT id FROM id";
        $result = $this->pdo->query($query);
        $res = $result->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $key => $value) {
            $ids[$key] = $value[0];
        }

        //获取当天日期
        $timezone = 'Asia/Shanghai';
        $fp = @fopen("/etc/yuneng/timezone.conf", 'r');
        if ($fp) {
            $timezone = fgets($fp);
            fclose($fp);
        }
        date_default_timezone_set($timezone);
        $query_date = date("Ymd",time());
        
        //从数据库中查找每台优化器当天最新数据
        $dsn = 'sqlite:'.APPPATH.'../../../optimizer.db';
        $this->pdo = new PDO($dsn);
        foreach ($ids as $num => $optimizer) {
            $query = "SELECT * FROM date$query_date WHERE 
                date_time=(SELECT max(date_time) FROM date$query_date WHERE id='$optimizer') 
                AND  id='$optimizer' ";
            $result = $this->pdo->query($query);
            if(empty($result))return $data;
            $res = $result->fetch(PDO::FETCH_ASSOC);
            if(empty($res)) {
                $data['curdata'][$num] = array(
                    'id' => $optimizer,
                    'date_time' => '-',
                    'output_voltage' => '-',
                    'output_current' => '-',
                    'output_power' => '-',
                    'input_voltage_pv1' => '-',
                    'input_current_pv1' => '-',
                    'input_power_pv1'=> '-',
                    'input_voltage_pv2' => '-',
                    'input_current_pv2' => '-',
                    'input_power_pv2' => '-',
                    'temperature' => '',
                    );
            }
            else {
                foreach ($res as $key => $value) {
                    $data['curdata'][$num][$key] = $value;
                }
            }
        }
      
        return $data;
    }
    
    //获取当前系统数据
    public function get_cur_graph() 
    {
        /* 初始化 */
        $data = array(
            'system_power' => array(),
            'ids' => array(),
            'title' => 'System Power',
            'subtitle' => 'No Data',
        );
        
        //获取优化器ID
        $query = "SELECT id FROM id";
        $result = $this->pdo->query($query);
        $res = $result->fetchAll(PDO::FETCH_NUM);
        foreach ($res as $key => $value) {
            $data['ids'][$key] = $value[0];
        }

        //读取当前时区
        $timezone = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp) {
            $timezone = fgets($fp);
            fclose($fp);
        }
        date_default_timezone_set($timezone);

        //获取当前日期（今天）
        $date = date("Y-m-d",time());
        sscanf($date, "%d-%d-%d", $year, $month, $day);
        $query_date = sprintf("%04d%02d%02d", $year, $month, $day);

        //获取数据
        $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
        $this->pdo = new PDO($dsn);
        $query = "SELECT time,each_system_power FROM each_system_power WHERE date=$query_date";
        $result = $this->pdo->query($query);
        if(empty($result))return $data;//没有数据
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($res))$data['subtitle'] = '';
        foreach ($res as $key => $value) {
            $data['system_power'][$key]['time'] = strtotime($query_date.$value['time'])*1000;
            $data['system_power'][$key]['power'] = intval($value['each_system_power']);
        }

        return $data;
    }
    
    /* 获取历史数据 */
    public function get_old_graph()
    {
        /* 初始化 */
        $data = array(
            'value' => array(),
            'title' => 'power',
            'subtitle' => 'No Data',
            'test' => '2'
        );
        
        //读取当前时区
        $timezone = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp) {
            $timezone = fgets($fp);
            fclose($fp);
        }
        date_default_timezone_set($timezone);
    
        //获取选择日期
        $date = $this->input->post('date');
        sscanf($date, "%d-%d-%d", $year, $month, $day);
        $query_date = sprintf("%04d%02d%02d", $year, $month, $day);
        
        //获取优化器ID
        $optimizer_id = $this->input->post('optimizer_id');
        $optimizer_id = trim($optimizer_id);

        //获取数据种类（功率或电压）
        $data_type = $this->input->post('data_type');

        if(strlen($optimizer_id) == 12) {
            //获取单个优化器的数据
            $dsn = 'sqlite:'.APPPATH.'../../../optimizer.db';
            $this->pdo = new PDO($dsn);
            $query = "SELECT date_time,output_power,input_power_pv1,input_power_pv2 FROM date$query_date WHERE id='$optimizer_id' ";
            $result = $this->pdo->query($query);
            if(empty($result))return $data;//没有数据,返回
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            if(count($res))$data['subtitle'] = '';
            foreach ($res as $key => $value) {
                $data['value'][$key]['time'] = strtotime($value['date_time'])*1000;
                $data['value'][$key]['output'] = intval($value['output_power']);
                $data['value'][$key]['input_pv1'] = intval($value['input_power_pv1']);
                $data['value'][$key]['input_pv2'] = intval($value['input_power_pv2']);
            }
        }
        else {
            //获取系统的数据
            $dsn = 'sqlite:'.APPPATH.'../../../historical_data.db';
            $this->pdo = new PDO($dsn);
            $query = "SELECT time,each_system_power FROM each_system_power WHERE date=$query_date";
            $result = $this->pdo->query($query);
            if(empty($result))return $data;//没有数据，返回
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            if(count($res))$data['subtitle'] = '';
            foreach ($res as $key => $value) {
                $data['value'][$key]['time'] = strtotime($query_date.$value['time'])*1000;
                $data['value'][$key]['output'] = intval($value['each_system_power']);
            }
        }

        
    
        return $data;
    }
    
}


/* End of file realtimedata_model.php */
/* Location: ./application/models/realtimedata_model.php */