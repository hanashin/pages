<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hidden extends CI_Controller {

    public $page = "hidden";

    public function __construct()
    {
        parent::__construct();

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
        //加载页面显示语言文件
        $this->lang->load('page', $language);
        //加载验证信息语言文件
        $this->lang->load('validform', $language);
    }

    /* 显示实时数据(默认函数) */

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
        $data = $this->hidden_model->exec_command();
        $this->debug($data['result']);
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
    public function updatecenter($result = "")
    {        
        $data = $this->hidden_model->get_updatecenter();
        $data['page'] = $this->page;
        $data['func'] = "updatecenter";
        $data['result'] = $result;
        $this->load->view('templates/header', $data);
        $this->load->view('hidden/updatecenter', $data);
        $this->load->view('templates/footer'); 
    }

    /* 设置自动更新的服务器的地址和端口 */
    public function set_updatecenter()
    {
        $data = $this->hidden_model->set_updatecenter();  
        $this->updatecenter($data['result']);
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
        $data = $this->hidden_model->set_datacenter();
        $this->datacenter($data['result']);  
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
        $data = $this->hidden_model->set_serial();
        $this->serial($data['result']);  
    }

}


/* End of file hidden.php */
/* Location: ./application/controllers/hidden.php */