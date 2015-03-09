<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller {

    public $page = "configuration";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');    
        $this->load->model('configuration_model');

       /* 设置系统语言 */
        $language = "english";
        $fp = @fopen("/etc/yuneng/language.conf",'r');
        if($fp)
        {
            $language = fgets($fp);
            fclose($fp);
        }
        else if($this->session->userdata("language"))
        {
            $language = $this->session->userdata("language");
        }
        //加载页面显示语言文件
        $this->lang->load('page', $language);
        //加载验证信息语言文件
        $this->lang->load('validform', $language);
    }

    /* 显示登陆页面 */
    public function login()
    {
        $data['page'] = $this->page;
        $data['func'] = "login";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('configuration/login');
        $this->load->view('templates/footer');
       
    }

    /* 验证登陆信息 */
    public function check_login()
    {
        $results = $this->configuration_model->check_login();
        $results["message"] = $this->lang->line("login_result_{$results["value"]}");
        echo json_encode($results);           
    }

    /* 显示5项交流保护参数(默认函数) */
    public function index()
    {
        if($this->session->userdata('logged_in') == FALSE){
            $this->login();
        }
        else{
            $data = $this->configuration_model->get_protection();
            $data['page'] = $this->page;
            $data['func'] = "protection";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('configuration/protection');
            $this->load->view('templates/footer');
        }   
    } 

    /* 设置5项交流保护参数 */
    public function set_protection()
    {
        $results = $this->configuration_model->set_protection();       
        $results["message"] = $this->lang->line("protection_result_{$results["value"]}"); 
        echo json_encode($results);
    }

    /* 读取逆变器交流保护参数 */
    public function read_inverter_parameters()
    {
        $results = $this->configuration_model->read_inverter_parameters();
        $results["message"] = $this->lang->line("read_protection_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示13项交流保护参数(默认函数) */
    public function protection2()
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_protection2();
            $data['page'] = $this->page;
            $data['func'] = "protection2";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('configuration/protection2');
            $this->load->view('templates/footer');
        }   
    } 

    /* 设置13项交流保护参数 */
    public function set_protection2()
    {
        $results = $this->configuration_model->set_protection2();
        $results["message"] = $this->lang->line("protection_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示逆变器GFDI状态 */
    public function gfdi_state()
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_gfdi_state();
            $data['page'] = $this->page;
            $data['func'] = "gfdi";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('configuration/gfdi_state');
            $this->load->view('templates/footer');
        }      
    }

    /* 设置逆变器GFDI状态 */
    public function set_gfdi_state()
    {
        $results = $this->configuration_model->set_gfdi_state();
        $results["message"] = $this->lang->line("gfdi_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示逆变器开关机状态 */
    public function switch_state()
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_switch_state();
            $data['page'] = $this->page;
            $data['func'] = "switch";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('configuration/switch_state');
            $this->load->view('templates/footer');
        }
    }

    /* 设置逆变器开关机状态 */
    public function set_switch_state()
    {
        $results = $this->configuration_model->set_switch_state();
        $results["message"] = $this->lang->line("switch_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 设置所有逆变器为开机状态 */
    public function set_switch_all_on()
    {
        $results = $this->configuration_model->set_switch_all_on();
        $results["message"] = $this->lang->line("switch_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 设置所有逆变器为关机状态 */
    public function set_switch_all_off()
    {
        $results = $this->configuration_model->set_switch_all_off();
        $results["message"] = $this->lang->line("switch_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示逆变器最大功率 */
    public function maxpower($result= "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_maxpower();
            $data['page'] = $this->page;
            $data['func'] = "maxpower"; 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('configuration/maxpower');
            $this->load->view('templates/footer');
        }
    }

    /* 设置逆变器最大功率 */
    public function set_maxpower()
    {
        $results = $this->configuration_model->set_maxpower();
        $results["message"] = $this->lang->line("maxpower_result_{$results["value"]}");
        echo json_encode($results);
    }
}


/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */