<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realtimedata extends CI_Controller {

    public $page = "realtimedata";

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');    
        $this->load->model('realtimedata_model');

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
    public function index()
    {      
        $data = $this->realtimedata_model->get_data();
        $data['page'] = $this->page;
        $data['func'] = "data";
        $this->load->view('templates/header', $data);
        $this->load->view('realtimedata/realtimedata', $data);
        $this->load->view('templates/footer');
    }

    /* 显示图表 */
    public function power_graph()
    {      
        $data = $this->realtimedata_model->get_power_graph();
        $data['page'] = $this->page;
        $data['func'] = "power";
        $this->load->view('templates/header', $data);
        $this->load->view('realtimedata/power_graph', $data);
        $this->load->view('templates/footer');
    }

    /* 显示图表 */
    public function energy_graph()
    {      
        $data = $this->realtimedata_model->get_energy_graph();
        $data['page'] = $this->page;
        $data['func'] = "energy";
        $this->load->view('templates/header', $data);
        $this->load->view('realtimedata/energy_graph', $data);
        $this->load->view('templates/footer');
    }

    /* 显示逆变器工作状态 */
    public function inverter_status()
    {      
        $data = $this->realtimedata_model->get_inverter_status();
        $data['page'] = $this->page;
        $data['func'] = "inverter_status";
        $this->load->view('templates/header', $data);
        $this->load->view('realtimedata/inverter_status', $data);
        $this->load->view('templates/footer');
    }


}


/* End of file realtimedata.php */
/* Location: ./application/controllers/realtimedata.php */