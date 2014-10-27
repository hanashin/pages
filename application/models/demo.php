<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/* 查询数据库 */
	$data['name'] = "";
	$query = "SELECT id FROM id";
	$result = $this->pdo->prepare($query);
    if(!empty($result))
    {   
        $result->execute();     
        $res = $result->fetchAll();
        $data['name'] = "";
    }

    /* 设置系统语言 */
    $language = "english";
    $fp = fopen("/etc/yuneng/language.conf",'r');
    if($fp)
    {
        $language = fgets($fp);
        fclose($fp);
    }

    //设置系统默认语言（用于表单输入验证）
    $this->config->set_item('language', $language);

    //加载页面显示语言文件
    $this->lang->load('page', $language);

    //加载返回信息语言文件
    $this->lang->load('result', $language);
    


/* End of file demo.php */
/* Location: ./application/models/demo.php */