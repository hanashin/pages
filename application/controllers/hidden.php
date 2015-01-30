<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidden extends CI_Controller {

    public $page = "hidden";

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');    
        $this->load->model('hidden_model');

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

    /* 显示DEBUG页面 */
    public function debug($result = "")
    {
        $data['page'] = $this->page;
        $data['func'] = "debug";
        $data['result'] = $result;      
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/debug', $data);
        $this->load->view('templates/footer');
    }

     /* 执行DEBUG命令 */
    public function exec_command()
    {      
        $results = $this->hidden_model->exec_command();
        $results["message"] = $this->lang->line("updatecenter_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示导数据页面 */
    public function export_file()
    {
        $data = $this->hidden_model->get_export_time();
        $data['page'] = $this->page;
        $data['func'] = "export_file";  
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/export_file', $data);
        $this->load->view('templates/footer');
    }

    /* 执行导数据操作 */
    public function exec_export_file()
    {
        $this->hidden_model->exec_export_file();  
    }

    /* 显示自动更新的服务器的地址和端口 */
    public function updatecenter()
    {        
        $data = $this->hidden_model->get_updatecenter();
        $data['page'] = $this->page;
        $data['func'] = "updatecenter";
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/updatecenter', $data);
        $this->load->view('templates/footer'); 
    }

    /* 设置自动更新的服务器的地址和端口 */
    public function set_updatecenter()
    {
        $results = $this->hidden_model->set_updatecenter();
        $results["message"] = $this->lang->line("updatecenter_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示EMA的地址和端口 */
    public function datacenter($result = "")
    {        
        $data = $this->hidden_model->get_datacenter();
        $data['page'] = $this->page;
        $data['func'] = "datacenter";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/datacenter', $data);
        $this->load->view('templates/footer');  
    }

    /* 设置EMA的地址和端口 */
    public function set_datacenter()
    {
        $results = $this->hidden_model->set_datacenter();
        $results["message"] = $this->lang->line("datacenter_result_{$results["value"]}");
        echo json_encode($results);
    }

    /* 显示初始化页面 */
    public function initialize($result = "")
    {
        $data['page'] = $this->page;
        $data['func'] = "initialize";
        $data['result'] = $result;      
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/initialize', $data);
        $this->load->view('templates/footer');
    }

    /* 执行初始化操作 */
    public function exec_initialize()
    {      
        $data = $this->hidden_model->exec_initialize();
        $this->initialize($data['result']);
    }

    /* 显示串口信息 */
    public function serial($result = "")
    {        
        $data = $this->hidden_model->get_serial();
        $data['page'] = $this->page;
        $data['func'] = "serial";
        $data['result'] = $result;  
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/serial', $data);
        $this->load->view('templates/footer');  
    }

    /* 设置串口信息 */
    public function set_serial()
    {        
        $results = $this->hidden_model->set_serial();
        $results["message"] = $this->lang->line("serial_result_{$results["value"]}");
        echo json_encode($results);
    }
    
    /* 显示电网环境页面 */
    public function grid_environment()
    {
        $data = $this->hidden_model->get_grid_environment();
        $data['page'] = $this->page;
        $data['func'] = "grid_environment";
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/grid_environment', $data);
        $this->load->view('templates/footer');
    }
    
    /* 设置电网环境 */
    public function set_grid_environment()
    {
        $results = $this->hidden_model->set_grid_environment();
        $results["message"] = $this->lang->line("grid_environment_result_{$results["value"]}");
        echo json_encode($results);
    }
    
    /* 读取电网环境 */
    public function read_grid_environment()
    {
        $results = $this->hidden_model->read_grid_environment();
        $results["message"] = $this->lang->line("grid_environment_result_{$results["value"]}");
        echo json_encode($results);
    }
    
    /* 显示IRD控制页面 */
    public function ird()
    {
        $data = $this->hidden_model->get_ird();
        $data['page'] = $this->page;
        $data['func'] = "ird";
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/ird', $data);
        $this->load->view('templates/footer');
    }
    
    /* 设置IRD控制 */
    public function set_ird()
    {
        $results = $this->hidden_model->set_ird();
        $results["message"] = $this->lang->line("ird_result_{$results["value"]}");
        echo json_encode($results);
    }
    
    /* 读取IRD控制 */
    public function read_ird()
    {
        $results = $this->hidden_model->read_ird();
        $results["message"] = $this->lang->line("ird_result_{$results["value"]}");
        echo json_encode($results);
    }
    
    /* 显示逆变器信号强度页面 */
    public function signal_level()
    {
        $data = $this->hidden_model->get_signal_level();
        $data['page'] = $this->page;
        $data['func'] = "signal_level";
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/signal_level', $data);
        $this->load->view('templates/footer');
    }
    
    /* 读取逆变器信号强度 */
    public function read_signal_level()
    {
        $results = $this->hidden_model->read_signal_level();
        $results["message"] = $this->lang->line("signal_level_result_{$results["value"]}");
        echo json_encode($results);
    }

}

/* End of file hidden.php */
/* Location: ./application/controllers/hidden.php */