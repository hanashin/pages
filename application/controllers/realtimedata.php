<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realtimedata extends CI_Controller {

    public $page = "realtimedata";
    public $nav = array(
        'realtimedata' => array(
            'url' => 'index.php/realtimedata',
            'active' => '0',
            'name' => 'data'
            ),
        'graph' => array(
            'url' => 'index.php/realtimedata/graph',
            'active' => '0',
            'name' => 'energy'
        )
    );

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
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
        else if($this->session->userdata("language"))
        {
            $language = $this->session->userdata("language");
        }
        //加载页面显示语言文件
        $this->lang->load('page', $language);
        //加载验证信息语言文件
        $this->lang->load('validform', $language);
    }

    /* 显示实时数据(默认函数) */
    public function index()
    {
        //页面、标题、导航
        $data['page'] = $this->page;
        $data['func'] = "data";
        $this->nav['realtimedata']['active'] = '1';
        $data['nav'] = $this->nav;
        
        //获取数据
        $result = $this->realtimedata_model->get_data();
        $data = array_merge($data, $result);
        
        //显示页面
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('realtimedata/realtimedata', $data);
        $this->load->view('templates/footer');
    }
    
    /* 显示图表 */
    public function graph()
    {
        $data['func'] = "energy";
        $this->nav['graph']['active'] = '1';
        $data['nav'] = $this->nav;
        $data['page'] = $this->page;
        $result = $this->realtimedata_model->get_cur_graph();
        $data = array_merge($data, $result);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('realtimedata/graph');
        $this->load->view('templates/footer');
    }
    
    /* 显示图表 */
    public function get_old_graph()
    {
        $results = $this->realtimedata_model->get_old_graph();
        echo json_encode($results);    
    }

}

/* End of file realtimedata.php */
/* Location: ./application/controllers/realtimedata.php */