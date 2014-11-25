<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {

    public $page = "management";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');    
        $this->load->model('management_model');

        /* 设置系统语言 */
        $language = "english";
        $fp = @fopen("/etc/yuneng/language.conf",'r');
        if($fp)
        {
            $language = fgets($fp);
            fclose($fp);
        }
        //加载页面显示语言文件
        $this->lang->load('page', $language);
        //加载验证信息语言文件
        $this->lang->load('validform', $language);
    }

    /* 显示逆变器列表(默认函数) */
    public function index($result = "")
    {      
        $data = $this->management_model->get_id();
        $data['page'] = $this->page;
        $data['func'] = "id";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('management/id', $data);
        $this->load->view('templates/footer');
    }

	/* 设置逆变器列表 */
    public function set_id()
    { 
        $data = $this->management_model->set_id();
        $data['page'] = $this->page;
        $data['func'] = "id";
        $this->load->view('templates/header', $data);
        $this->load->view('management/id', $data);
        $this->load->view('templates/footer');
        //$this->index($data['result']);
    }

    /* 清空逆变器列表 */
    public function set_id_clear()
    { 
        $data = $this->management_model->set_id_clear();
        $this->index($data['result']);
    }

    /* 显示时间时区信息 */
    public function datetime($result = "")
    {  
        $data = $this->management_model->get_datetime();
        $data['page'] = $this->page;
        $data['func'] = "time";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('management/datetime', $data);
        $this->load->view('templates/footer');
    }

    /* 设置日期时间 */
    public function set_datetime()
    { 
        $data = $this->management_model->set_datetime();
        $this->datetime($data['result']);
    }

    /* 设置时区 */
    public function set_timezone()
    {  
        $data = $this->management_model->set_timezone(); 
        $this->datetime($data['result']);
    }

    /* 设置NTP服务器 */
    public function set_ntp_server()
    {  
        $data = $this->management_model->set_ntp_server();
        $this->datetime($data['result']);
    }

    /* 显示语言信息 */
    public function language($result = "")
    {      
        $data = $this->management_model->get_language();
        $data['page'] = $this->page;
        $data['func'] = "language";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('management/language', $data);
        $this->load->view('templates/footer');
    }

    /* 设置语言 */
    public function set_language($language = "english")
    {      
        $data = $this->management_model->set_language($language);
        $this->language($data['result']);
    }

    /* 显示网络配置信息 */
    public function network($result = "")
    {      
        $data = $this->management_model->get_network();
        $data['page'] = $this->page;
        $data['func'] = "network";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('management/network', $data);
        $this->load->view('templates/footer');
    }

    /* 设置GPRS */
    public function set_gprs()
    {      
        $data = $this->management_model->set_gprs();

        //将设置结果传给显示函数
        $this->network($data['result']);
    }

    /* 设置IP */
    public function set_ip()
    {
        $data = $this->management_model->set_ip();

        //将设置结果传给显示函数
        //$this->network($data['result']);
        $this->ecu_reboot();
    }

    /* 显示用户信息 */
    public function user_info($result = "")
    {      
        $data = $this->management_model->get_user_info();
        $data['page'] = $this->page;
        $data['func'] = "user_info";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('management/user_info', $data);
        $this->load->view('templates/footer');
    }

    /* 设置用户信息 */
    public function set_user_info()
    {      
        $data = $this->management_model->set_user_info();

        //成功修改密码后需要重新登录
        if(!strncmp($data['result'], "success", 7))
            $this->session->set_userdata('logged_in',FALSE);

        //将设置结果传给显示函数
        $this->user_info($data['result']);
    }

    /* 显示无线局域网 */
    public function wlan($result = "")
    {      
        $data = $this->management_model->get_wlan();
        $data['page'] = $this->page;
        $data['func'] = "wlan";
        $data['result'] = $result;
        if($data['mode'] == 2)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('management/wlan_sta', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            //默认为AP模式
            $this->load->view('templates/header', $data);
            $this->load->view('management/wlan_ap', $data);
            $this->load->view('templates/footer');
        }
    }

    /* 设置wifi模块工作模式 */
    public function set_wlan_mode()
    {      
        $data = $this->management_model->set_wlan_mode();
        //$this->wlan($data['result']);
        $this->ecu_reboot();
    }

    /* 设置主机模式参数 */
    public function set_wlan_ap()
    {      
        $data = $this->management_model->set_wlan_ap();
        //$this->wlan($data['result']);
        $this->ecu_reboot();
    }

    /* 设置从机模式参数 */
    public function set_wlan_sta()
    {      
        $data = $this->management_model->set_wlan_sta();
        $this->wlan($data['result']);
    }
    
    /* 重启ECU */
    public function ecu_reboot()
    {
        $this->load->view('templates/reboot');
    }

}


/* End of file management.php */
/* Location: ./application/controllers/management.php */