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
        //加载页面显示语言文件
        $this->lang->load('page', $language);
        //加载验证信息语言文件
        $this->lang->load('validform', $language);
    }

    /* 显示登陆页面 */
    public function login($result = "")
    {
        $data['page'] = $this->page;
        $data['func'] = "login";
        $data['result'] = $result;    
        $this->load->view('templates/header', $data);
        $this->load->view('configuration/login', $data);
        $this->load->view('templates/footer');
       
    }

    /* 验证登陆信息 */
    public function check_login()
    {
        $data = $this->configuration_model->check_login();
        if(!strncmp($data['result'], "failed", 6)  && !$this->session->userdata('logged_in'))
        {
            //用户名密码错误
            $this->login($data['result']);
        }
        else
        {     
            //用户名密码正确(登陆成功)
            $this->session->set_userdata('logged_in',TRUE);
            $page = $this->session->userdata('page');
            if(!strncmp($page, "protection2", 11)){
                $this->protection2();
            }
            else if(!strncmp($page, "gfdi_state", 10)){
                $this->gfdi_state();
            }
            else if(!strncmp($page, "switch_state", 12)){
                $this->switch_state();
            }
            else if(!strncmp($page, "maxpower", 8)){
                $this->maxpower();
            }
            else{
                $this->index();
            }
        }             
    }

    /* 显示5项交流保护参数(默认函数) */
    public function index($result = "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->session->set_userdata('page','protection');
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_protection();
            $data['page'] = $this->page;
            $data['func'] = "protection";
            $data['result'] = $result;
            $this->load->view('templates/header', $data);
            $this->load->view('configuration/protection', $data);
            $this->load->view('templates/footer');
        }   
    } 

    /* 设置5项交流保护参数 */
    public function set_protection()
    {
        //print_r($_POST);
        $data = $this->configuration_model->set_protection();       
        //print_r($data);
        echo $data['result'];       
    }

    /* 读取逆变器交流保护参数 */
    public function read_inverter_parameters()
    {
        $data = $this->configuration_model->read_inverter_parameters();
        if($data['flag'] == 2)  
            $this->protection2();
        else
            $this->index();
    }

    /* 显示13项交流保护参数(默认函数) */
    public function protection2($result = "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->session->set_userdata('page','protection2');
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_protection2();
            $data['page'] = $this->page;
            $data['func'] = "protection2";
            $data['result'] = $result;  
            $this->load->view('templates/header', $data);
            $this->load->view('configuration/protection2', $data);
            $this->load->view('templates/footer');
        }   
    } 

    /* 设置13项交流保护参数 */
    public function set_protection2()
    {
        $data = $this->configuration_model->set_protection2();
        $this->protection2($data['result']);
    }

    /* 显示逆变器GFDI状态 */
    public function gfdi_state($result = "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->session->set_userdata('page','gfdi_state');
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_gfdi_state();
            $data['page'] = $this->page;
            $data['func'] = "gfdi";
            $data['result'] = $result;    
            $this->load->view('templates/header', $data);
            $this->load->view('configuration/gfdi_state', $data);
            $this->load->view('templates/footer');
        }      
    }

    /* 设置逆变器GFDI状态 */
    public function set_gfdi_state()
    {
           $data = $this->configuration_model->set_gfdi_state();
           $this->gfdi_state($data['result']);
    }

    /* 显示逆变器开关机状态 */
    public function switch_state($result = "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->session->set_userdata('page','switch_state');
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_switch_state();
            $data['page'] = $this->page;
            $data['func'] = "switch";
            $data['result'] = $result;    
            $this->load->view('templates/header', $data);
            $this->load->view('configuration/switch_state', $data);
            $this->load->view('templates/footer');
        }
    }

    /* 设置逆变器开关机状态 */
    public function set_switch_state()
    {
        $data = $this->configuration_model->set_switch_state();
        $this->switch_state($data['result']);
    }

    /* 设置所有逆变器为开机状态 */
    public function set_switch_all_on()
    {
        $data = $this->configuration_model->set_switch_all_on();
        $this->switch_state($data['result']);
    }

    /* 设置所有逆变器为关机状态 */
    public function set_switch_all_off()
    {
        $data = $this->configuration_model->set_switch_all_off();
        $this->switch_state($data['result']);
    }

    /* 显示逆变器最大功率 */
    public function maxpower($result= "")
    {
        if($this->session->userdata('logged_in') == FALSE)
        {
            $this->session->set_userdata('page','maxpower');
            $this->login();
        }
        else
        {
            $data = $this->configuration_model->get_maxpower();
            $data['page'] = $this->page;
            $data['func'] = "maxpower";
            $data['result'] = $result;    
            $this->load->view('templates/header', $data);
            $this->load->view('configuration/maxpower', $data);
            $this->load->view('templates/footer');
        }
    }

    /* 设置逆变器最大功率 */
    public function set_maxpower()
    {
        $data = $this->configuration_model->set_maxpower();
        $this->maxpower($data['result']);
    }
}


/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */