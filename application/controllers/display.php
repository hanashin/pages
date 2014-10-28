<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {

    public $page = "display";

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');    
        $this->load->model('display_model');

        /* 设置系统语言 */
        $language = "english";
        $fp = fopen("/etc/yuneng/language.conf",'r');
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

    /* 显示逆变器状态 */
    public function status()
    {      
        $data = $this->display_model->get_status();
        $data['page'] = $this->page;
        $data['func'] = "status";
        $this->load->view('templates/header', $data);
        $this->load->view('display/status', $data);
        $this->load->view('templates/footer');
    }

    /* 显示逆变器状态2 */
    public function status2()
    {      
        $data = $this->display_model->get_status2();
        $data['page'] = $this->page;
        $data['func'] = "status2";
        $this->load->view('templates/header', $data);
        $this->load->view('display/status', $data);
        $this->load->view('templates/footer');
    }

    /* 显示数据库database.db */
    public function database($table = "id")
    {     
        $data = $this->display_model->get_database($table);
        $data['page'] = $this->page;
        $data['func'] = "database";
        $this->load->view('templates/header', $data);
        $this->load->view('display/database', $data);
        $this->load->view('templates/footer');
    }

    /* 显示历史数据库historical_data.db */
    public function historical_data($table = "lifetime_energy")
    {     
        $data = $this->display_model->get_historical_data($table);
        $data['page'] = $this->page;
        $data['func'] = "historical_data";
        $this->load->view('templates/header', $data);
        $this->load->view('display/historical_data', $data);
        $this->load->view('templates/footer');
    }
}


/* End of file display.php */
/* Location: ./application/controllers/display.php */