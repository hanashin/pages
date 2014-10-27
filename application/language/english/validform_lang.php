<?php
/* 
 * 该文件保存表单验证的显示语言（英文版） 
 */
	
/* 参数配置 */
	//交流保护参数
	$lang['validform_under_voltage_fast'] = "Please input an integer between 0-999";//外围电压下限
	$lang['validform_over_voltage_fast'] = "Please input an integer between 0-999";//外围电压上限
	$lang['validform_under_voltage_slow'] = "Please input an integer between 0-999";//内围电压下限
	$lang['validform_over_voltage_slow'] = "Please input an integer between 0-999";//内围电压上限
	$lang['validform_under_frequency_fast'] = "Please input a decimal number between 0-99(precision to 1st decimal)";//外围频率下限
	$lang['validform_over_frequency_fast'] = "Please input a decimal number between 0-99(precision to 1st decimal)";//外围频率上限
	$lang['validform_under_frequency_slow'] = "Please input a decimal number between 0-99(precision to 1st decimal)";//内围频率下限
	$lang['validform_over_frequency_slow'] = "Please input a decimal number between 0-99(precision to 1st decimal)";//内围频率上限
	$lang['validform_voltage_triptime_fast'] = "Please input a decimal number between 0-1(precision to 2nd decimal)";//外围过欠压延迟保护时间
	$lang['validform_voltage_triptime_slow'] = "Please input a decimal number between 0-99(precision to 2nd decimal)";//内围过欠压延迟保护时间
	$lang['validform_frequency_triptime_fast'] = "Please input a decimal number between 0-1(precision to 2nd decimal)";//外围过欠频延迟保护时间
	$lang['validform_frequency_triptime_slow'] = "Please input a decimal number between 0-99(precision to 2nd decimal)";//内围过欠频延迟保护时间
	$lang['validform_grid_recovery_time'] = "Please input an integer between 0-99999";//并网恢复时间
	
/* 系统管理 */	
	//网络管理
	$lang['validform_ip_address'] = "The IP address format error";
	$lang['validform_subnet_mask'] = "The Subnet mask format error";
	$lang['validform_default_gateway'] = "The Default gateway format error";
	$lang['validform_preferred_dns_server'] = "The Preferred DNS server format error";
	$lang['validform_alternate_dns_server'] = "The Alternate DNS server format error";
	$lang['validform_null_ip_address'] = "Please input IP address";
	$lang['validform_null_subnet_mask'] = "Please input Subnet mask";
	$lang['validform_null_default_gateway'] = "Please input Default gateway";
	$lang['validform_null_preferred_dns_server'] = "Please input Preferred DNS server";
	
	//用户管理
	$lang['validform_username'] = "请输入4-18位任意字符";
	$lang['validform_old_password'] = "请输入6-18位任意字符";
	$lang['validform_new_password'] = "请输入6-18位任意字符";
	$lang['validform_confirm_password'] = "两次输入的密码不一致";
	$lang['validform_null_username'] = "Please input the username";
	$lang['validform_null_old_password'] = "Please input the old password";
	$lang['validform_null_new_password'] = "Please input the new password";
	$lang['validform_null_confirm_password'] = "Please confirm the new password";
	
	//无线网络管理
	  //AP
	$lang['validform_ap_ssid'] = "请输入4-18位任意字符";
	$lang['validform_ap_password_wep'] = "请输入5位或13位字符";
	$lang['validform_ap_password_wpa'] = "请输入8-18位任意字符";
	$lang['validform_null_ap_ssid'] = "请输入信号名称";
	$lang['validform_null_ap_password'] = "请输入密码";
      //STA	
	  
/* 隐藏功能 */	
	//服务器地址与端口
	$lang['validform_domain'] = "请输入正确格式的域名";
	$lang['validform_ip_address'] = "The IP address format error";
	$lang['validform_port'] = "请输入正确格式的端口";
	$lang['validform_null_domain'] = "请输入域名";
	$lang['validform_null_ip_address'] = "Please input IP address";
	$lang['validform_null_port'] = "请输入端口";
	$lang['validform_null_port1'] = "请输入端口1";
	$lang['validform_null_port2'] = "请输入端口2";
	
	//串口
	$lang['validform_ecu_address'] = "请输入0-128的整数";
	$lang['validform_null_ecu_address'] = "请输入ECU地址";
	
?>