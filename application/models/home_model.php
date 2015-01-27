<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

    public $pdo;

    public function __construct() 
    {
        parent::__construct();
        $dsn = 'sqlite:'.APPPATH.'../../../database.db';
        $this->pdo = new PDO($dsn);          
    }

    public function get_data() 
    {
        $data = array();
        
        //获取ECU当前设置的时区
        $data['timezone'] = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if ($fp)
        {
            $data['timezone'] = fgets($fp);
            fclose($fp);
        }
        date_default_timezone_set($data['timezone']);//设置默认时区
        
        /* 查询ECU_ID */
        $data['ecuid'] = "000000000000";
        $fp = @fopen("/etc/yuneng/ecuid.conf",'r');
        if($fp){
         $data['ecuid'] = fgets($fp);
         fclose($fp);
        }

        /* 查询历史发电量 */
        $data['lifetimepower'] = "0";
        $query = "select * from ltpower";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {      
            $result->execute();     
            $res = $result->fetchAll();
            $data['lifetimepower'] = number_format($res[0][1], 2);
        }

        /* 查询最近一次系统功率 */
        $data['systemp'] = "0";
        $fp = @fopen("/tmp/system_p_display.conf",'r');
        if($fp){
             $data['systemp'] = fgets($fp);
             fclose($fp);
        }

        /* 查询最近一次连接服务器时间 */
        $data['datetime'] = "Never connected";
        $fp = @fopen("/etc/yuneng/connect_time.conf",'r');
        if($fp){
            $data['datetime'] = fgets($fp);
            fclose($fp);
            if(!$data['datetime'])
                $data['datetime'] = "Never connected";         
        }
        

        /* 查询逆变器总台数 */
        $data['maxnum'] = "0";
        $query = "select id from id";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {   
            $result->execute();     
            $res = $result->fetchAll();
            $data['maxnum'] = count($res);
        }

        /* 查询最近一次逆变器连接台数 */
        $data['curnum'] = "0";
        $fp = @fopen("/tmp/current_number.conf",'r');
        if($fp){
            $data['curnum'] = fgets($fp);
            fclose($fp);
        }

        /* 查询软件版本号 */
        $data['version'] = "";
        $fp = @fopen("/etc/yuneng/version.conf",'r');
        if($fp){
            $data['version'] = fgets($fp);
            fclose($fp);
        }

        /* 查询数据库使用量 */
        $data['file_size'] = @filesize("/home/record.db")/1024;

        /* 查询当前时区 */
        $data['timezone'] = "Asia/Shanghai";
        $fp = @fopen("/etc/yuneng/timezone.conf",'r');
        if($fp){
         $data['timezone'] = fgets($fp);
         fclose($fp);
        }

        /* 查询ECU_Mac地址 */
        $data['mac'] = "";
        $fp = @fopen("/etc/yuneng/ecumac.conf",'r');
        if($fp){
         $data['mac'] = fgets($fp);
         fclose($fp);
        }

        /* 查询系统当天累计发电量 */
        $data['todaypower'] = "0";
        date_default_timezone_set($data['timezone']);
        $localtime_assoc = localtime(time(), true);
        $date = sprintf("%04d%02d%02d",
                        $localtime_assoc['tm_year'] + 1900,
                        $localtime_assoc['tm_mon'] + 1,
                        $localtime_assoc['tm_mday']
                    );
        $query = "select * from tdpower";
        $result = $this->pdo->prepare($query);
        if(!empty($result))
        {      
            $result->execute();     
            $res = $result->fetchAll();
            if(!strcmp($date, $res[0][0]))
            {
                $data['todaypower'] = number_format($res[0][1], 2);
            }
            else
            {
                $data['todaypower'] = "0";
            }
        }
        
        /* 查询电网质量 */
        $data['grid_quality'] = "";
        $fp = @fopen("/etc/yuneng/plc_grid_quality.txt",'r');
        if($fp){
            $data['grid_quality'] = fgets($fp);
            fclose($fp);
        }

        return $data;
    }

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */