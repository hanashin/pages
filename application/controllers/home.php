<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public $page = "home";

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('home_model');

        /* 设置系统语言 */
        $language = "chinese";
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

    public function index()
    {
        $data = $this->home_model->get_data();
        $data['page'] = $this->page;
        $data['func'] = "home";
        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function faq()
    {
        $data['page'] = $this->page;
        $data['func'] = "faq";
        $this->load->view('templates/header', $data);
        $this->load->view('faq');
        $this->load->view('templates/footer');
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */