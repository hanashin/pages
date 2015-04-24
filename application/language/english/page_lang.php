<?php
/* 
 * 该文件保存ECU页面的显示语言（英文版） 
 */
/* 标题 */
	$lang['title'] = "Altenergy Power Control Software";
	$lang['title_ecu'] = "ENERGY COMMUNICATION UNIT";
	$lang['language'] = "Language";
	$lang['energy_control']="ENERGY CONTROL";
	$lang['test']="TEST";
	$lang['faq']="FAQ";
	
/* 通用 */
	$lang['button_save'] = "Save";
	$lang['button_update'] = "Update";
	$lang['button_ok'] = "OK";
	$lang['button_cancel'] = "Cancel";
	$lang['button_reset'] = "Reset";
	$lang['button_query'] = "Query";
	$lang['button_refresh'] = "Refresh";
	$lang['button_read'] = "Read";
	$lang['button_save_all'] = "Save All Inverters";
	$lang['button_read_all'] = "Read All Inverters";
	
	$lang['message_success'] = "Success";
	$lang['message_warning'] = "Warning";
	$lang['message_failed'] = "Failed";
	
	$lang['inverter_id'] = "Inverter ID";

	$lang['ecu_reboot_title'] = "ECU is rebooting ...";
	$lang['ecu_reboot'] = "Please do not refresh, if the page does not jump automatically, please enter the IP on LCD screen.";
	
/* 导航栏 */
	$lang['item_1'] = "Home";
	$lang['item_2'] = "Real Time Data";
	$lang['item_2_1'] = "Real Time Data";
	$lang['item_2_2'] = "Power";
	$lang['item_2_3'] = "Energy";
	$lang['item_2_4'] = "Inverter Status";
	$lang['item_3'] = "Configuration";
	$lang['item_3_1'] = "Parameters";
	$lang['item_3_2'] = "GFDI";
	$lang['item_3_3'] = "Remote Control";
	$lang['item_3_4'] = "Power Setting";
	$lang['item_4'] = "Administration";
	$lang['item_4_1'] = "ID Management";
	$lang['item_4_2'] = "Date,Time,Time Zone";
	$lang['item_4_3'] = "Language";
	$lang['item_4_4'] = "Network Connectivity";
	$lang['item_4_5'] = "User Management";
	$lang['item_4_6'] = "WLAN ";
	
/* 主页 */
	$lang['function_home'] = "Home";
	$lang['home_ecuid'] = "ECU ID";
	$lang['home_lifetimepower'] = "Lifetime generation";
	$lang['home_systemp'] = "Last System Power";
	$lang['home_todaypower'] = "Generation of Current Day";
	$lang['home_datetime'] = "Last Connection to website";
	$lang['home_maxnum'] = "Number of Inverters";
	$lang['home_curnum'] = "Last Number of Inverters Online";
	$lang['home_version'] = "Current Software Version";
	$lang['home_file_size'] = "Database Size";
	$lang['home_timezone'] = "Current Time Zone";
	$lang['home_eth0_mac'] = "ECU Eth0 Mac Address";
	$lang['home_wlan0_mac'] = "ECU Wlan0 Mac Address";
	$lang['home_grid_quality'] = "Inverter Comm. Signal Level";
	//环保效益
	$lang['home_environment_benefits'] = "ENVIRONMENTAL BENEFITS";
	$lang['home_equivalent'] = "CO<sub>2</sub> Offset Equivalent to";
	$lang['home_gallons'] = "GALLONS";
	$lang['home_trees'] = "TREES";
	$lang['home_kg'] = "KG";
	
/* 实时数据 */
	$lang['function_data'] = "Real Time Data";
	$lang['data_inverter_id'] = "Inverter ID";
	$lang['data_current_power'] = "Current Power";
	$lang['data_grid_frequency'] = "Grid Frequency";
	$lang['data_grid_voltage'] = "Grid Voltage";
	$lang['data_temperature'] = "Temperature";
	$lang['data_date'] = "Reporting Time";
	$lang['data_optimizer_id'] = "Optimizer ID";
	
	//图表属性
	$lang['graph_language'] = "lang:'en'";
	$lang['graph_title'] = "Power Generation";
	$lang['graph_y_label_power'] = "Power(W)";
	$lang['graph_y_label_energy'] = "Energy(kW·h)";
	$lang['graph_value_power'] = "Power";
	$lang['graph_value_energy'] = "Energy";
	$lang['graph_daily_energy'] = "Solar Generated Today";
	$lang['graph_weekly_energy'] = "Solar Generated Current Week";
	$lang['graph_monthly_energy'] = "Solar Generated Current Month";
	$lang['graph_yearly_energy'] = "Solar Generated Current Year";
		
	//功率曲线图
	$lang['function_power'] = "Power";
	
	//能量柱状图
	$lang['function_energy'] = "Charts";
	$lang['energy_weekly'] = "Current Week";
	$lang['energy_monthly'] = " Current Month";
	$lang['energy_yearly'] = "Current Year";
	
	//逆变器工作状态
	$lang['function_inverter_status'] = "Inverter Status";
	$lang['status_inverter_id'] = "Inverter ID";
	$lang['status_channel'] = "Channel";
	$lang['status_status'] = "Status";
	$lang['status_energy'] = "Energy";
	
/* 参数配置 */

	//登录页面
	$lang['function_login'] = "Login";
	$lang['login_title'] = "Login";
	$lang['login_username'] = "Username";
	$lang['login_password'] = "Password";
	$lang['login_login'] = "Login";	
	$lang['login_result_0'] = "Login successful !";
	$lang['login_result_1'] = "Incorrect username or password !";
	
	//交流保护参数
	$lang['function_protection'] = "Parameters";
	$lang['function_protection2'] = "Parameters";
	$lang['protection_set'] = "Settings";
	$lang['protection_actual_value'] = "Actual value";	
	$lang['protection_select_inverter'] = "Select Inverter";
	$lang['protection_select_inverter_all'] = "All Inverters";	
	$lang['protection_inverter_id'] = "Inverter ID";
	$lang['protection_under_voltage_fast'] = "Undervoltage Fast";
	$lang['protection_over_voltage_fast'] = "Overvoltage Fast";
	$lang['protection_under_voltage_slow'] = "Undervoltage Slow";
	$lang['protection_over_voltage_slow'] = "Overvoltage Slow";
	$lang['protection_under_frequency_fast'] = "Underfrequency Fast";
	$lang['protection_over_frequency_fast'] = "Overfrequency Fast";
	$lang['protection_under_frequency_slow'] = "Underfrequency Slow";
	$lang['protection_over_frequency_slow'] = "Overfrequency Slow";
	$lang['protection_voltage_triptime_fast'] = "Voltage Triptime Fast";
	$lang['protection_voltage_triptime_slow'] = "Voltage Triptime Slow";
	$lang['protection_frequency_triptime_fast'] = "Frequency Triptime Fast";
	$lang['protection_frequency_triptime_slow'] = "Frequency Triptime Slow";
	$lang['protection_grid_recovery_time'] = "Grid Recovery Time";
	$lang['protection_read_parameters'] = "Read parameters";
	
	$lang['protection_result_0'] = "Parameters saved successfully ! (See the results 5 minutes later)";
	$lang['protection_result_1'] = "Please enter at least one protection parameters !";
	$lang['read_protection_result_0'] = "Parameter read successfully ! (See the results 5 minutes later)";
	$lang['read_protection_result_1'] = "Parameter read failed !";
	
	//GFDI设置
	$lang['function_gfdi'] = "GFDI";
	$lang['gfdi_inverter_id'] = "Inverter ID";
	$lang['gfdi_state'] = "Status";
	$lang['gfdi_unlock'] = "Unlock GFDI";
	
	$lang['gfdi_result_0'] = "See the results 5 minutes later";
	$lang['gfdi_result_1'] = "Please select inverters need to be unlocked";
	
	//远程控制开关机
	$lang['function_switch'] = "Remote Control";
	$lang['switch_inverter_id'] = "Inverter ID";
	$lang['switch_state'] = "Status";
	$lang['switch_turn_on'] = "Turn On";
	$lang['switch_turn_off'] = "Turn Off";
	$lang['switch_turn_on_off'] = "Turn On/Off";
	$lang['switch_turn_on_all'] = "Turn on all inverters";
	$lang['switch_turn_off_all'] = "Turn off all inverters";
	
	$lang['switch_result_0'] = "See the results 5 minutes later !";
	$lang['switch_result_1'] = "Please select inverters !";
	$lang['switch_result_2'] = "Settings saved failed !";
	
	//最大功率设置
	$lang['function_maxpower'] = "Power Setting";
	$lang['maxpower_inverter_id'] = "Inverter ID";
	$lang['maxpower_maxpower'] = "Maximum Power (20-300W)";
	$lang['maxpower_actual_maxpower'] = "Actual Maximum Power";
	
	$lang['maxpower_result_0'] = "See the results 5 minutes later !";
	$lang['maxpower_result_1'] = "Please enter an integer between 20-300 !";
	$lang['maxpower_result_2'] = "Read maxpower failed !";
	
/* 系统管理 */
	//ID管理
	$lang['function_id'] = "ID Management";
	$lang['id_inverter_id'] = "Inverter ID";
	$lang['id_clear_id'] = "Clear ID";
	$lang['id_total'] = "Total";
	$lang['id_correct'] = "Update success";
	$lang['id_error'] = "Format error";
	
	$lang['clear_id_result_0'] = "ID cleared successfully !";
	$lang['set_id_result_0'] = "ID updated successfully !";
	$lang['set_id_result_1'] = "Malformed ID(s): ";
	$lang['set_id_result_2'] = "Please enter an inverter ID !";
	
	//时间管理
	$lang['function_time'] = "Date,Time,Time Zone";
	$lang['time_datetime'] = "Date Time";
	$lang['time_timezone'] = "Time Zone";
	$lang['time_ntp'] = "NTP Server";

	$lang['datetime_result_0'] = "Datetime updated successfully !";
	$lang['datetime_result_1'] = "Datetime updated failed !";	
	$lang['timezone_result_0'] = "Time Zone updated successfully !";
	$lang['timezone_result_1'] = "Time Zone updated failed !";
	$lang['ntp_result_0'] = "Ntp_server updated successfully !";
	$lang['ntp_result_1'] = "Ntp_server updated failed !";
	
	//语言管理
	$lang['function_language'] = "Language";
	$lang['language_current_language'] = "Current Language";
	$lang['language_english'] = "English";
	$lang['language_chinese'] = "Chinese";
	$lang['language_result_0'] = "Change Language Success";
	$lang['language_result_1'] = "Language configuration file open failed";
	
	//网络管理
	$lang['function_network'] = "Network Connectivity";
	$lang['network_set_gprs'] = "GPRS Settings";
	$lang['network_use_gprs'] = "Use GPRS Module";
	$lang['network_set_ip'] = "IP Settings";
	$lang['network_use_dhcp'] = "Obtain an IP address automatically";
	$lang['network_use_static_ip'] = "Use the following IP address";
	$lang['network_ip_address'] = "IP address";
	$lang['network_subnet_mask'] = "Subnet mask";
	$lang['network_default_gateway'] = "Default gateway";
	$lang['network_preferred_dns_server'] = "Preferred DNS server";
	$lang['network_alternate_dns_server'] = "Alternate DNS server";
	
	$lang['gprs_result_0_1'] = "GPRS enabled successfully !";
	$lang['gprs_result_0_0'] = "GPRS disabled successfully !";
	$lang['gprs_result_1_1'] = "GPRS enabled failed !";
	$lang['gprs_result_1_0'] = "GPRS disabled failed !";
	$lang['network_result_success_dhcp'] = "Dynamic IP updated successfully !";
	$lang['network_result_success_static_ip'] = "Static IP updated successfully !";
	
	//用户管理
	$lang['function_user_info'] = "User Management";
	$lang['user_info_username'] = "Username";
	$lang['user_info_new_username'] = "New Username";
	$lang['user_info_old_password'] = "Old Password";
	$lang['user_info_new_password'] = "New Password";
	$lang['user_info_confirm_password'] = "Confirm Password";
	$lang['user_info_change_password'] = "Change Password";
	
	$lang['user_info_result_0'] = "Password updated successfully !";
	$lang['user_info_result_1'] = "Incorrect username or old password !";
	$lang['user_info_result_2'] = "Please enter the new password !";
	$lang['user_info_result_3'] = "The passwords you entered do not match !";
	
	//无线网络管理
	$lang['function_wlan'] = "WLAN ";
	$lang['wlan_mode'] = "Mode";
	$lang['wlan_ssid'] = "SSID";
	$lang['wlan_ip_address'] = "IP address";
	$lang['wlan_state'] = "State";
	$lang['wlan_change_to_ap_mode'] = "Change to a Hotspot";
	$lang['wlan_change_to_sta_mode'] = "Connect to WLAN nearby";
	$lang['wlan_reboot'] = "WARNING : This operation will reboot ECU, to determine execution click on the ' OK' , otherwise click 'Cancel' .";
	  //AP
	$lang['wlan_mode_ap'] = "Hotspot";
	$lang['wlan_ifopen_1'] = "Opened";
	$lang['wlan_ifopen_0'] = "Closed";
	$lang['wlan_ap_setting'] = "Set up hotspot";
	$lang['wlan_ap_ssid'] = "SSID";
	$lang['wlan_ap_channel'] = "Channel";
	$lang['wlan_ap_channel_auto'] = "Auto";	
	$lang['wlan_ap_method'] = "Safe Type";
	$lang['wlan_ap_password'] = "Password";
	$lang['wlan_ap_update'] = "Update";	
	  //STA	
	$lang['wlan_mode_sta'] = "Connected";
	$lang['wlan_ifconnect_1'] = "Connected";
	$lang['wlan_ifconnect_0'] = "Disconnected";
	$lang['wlan_sta_signals'] = "Available networks";
	$lang['wlan_sta_ssid'] = "SSID";
	$lang['wlan_sta_quality'] = "Quality";
	$lang['wlan_sta_password'] = "Password";
	$lang['wlan_sta_connect'] = "Connect";
	$lang['wlan_sta_disconnect'] = "Disconnect";
	//wlan
	$lang['wlan_open'] = "Enable WLAN";
	$lang['wlan_open_info'] = "Are you sure you want to enable WLAN? This will disable hotspot and reboot ECU.";
	$lang['wlan_close'] = "Disable WLAN";
	$lang['wlan_close_info'] = "Are you sure you want to disable WLAN?";
	// hotspot
	$lang['hotspot_open'] = "Enable hotspot";
	$lang['hotspot_open_info'] = "Are you sure you want to enable hotspot? This will disable WLAN and reboot ECU.";
	$lang['hotspot_close'] = "Disable hotspot";
	$lang['hotspot_close_info'] = "Are you sure you want to disable hotspot?";
	$lang['hotspot_set'] = "Change hotspot settings";
	$lang['hotspot_set_info'] = "Are you sure you want to change hotspot settings? This will reboot ECU.";
		
	$lang['wlan_result_success_change_mode'] = "Setting success";
	$lang['wlan_result_success_set_ap'] = "Set Hotspot parameter success";
	$lang['wlan_result_success_connect_sta'] = "Connect WIFI success";
	$lang['wlan_result_success_disconnect_sta'] = "Disconnect WIFI success";
	$lang['wlan_result_failed_connect_sta'] = "Connect WIFI failed";
	$lang['wlan_result_failed_wrong_password'] = "password error";
	
/* 显示数据库数据 */
	//status
	$lang['function_status'] = "Status";
	$lang['function_status2'] = "Status2";
	$lang['display_status_event_id'] = "Event Id";
	$lang['display_status_event'] = "Event";
	$lang['display_status_inverter_id'] = "Inverter ID";
	$lang['display_status_date'] = "Date";
	$lang['display_status_event_0'] = "AC Frequency Under Range";
	$lang['display_status_event_1'] = "AC Frequency Exceeding Range";
	$lang['display_status_event_2'] = "AC Voltage Exceeding Range";
	$lang['display_status_event_3'] = "AC Voltage Under Range";
	$lang['display_status_event_7'] = "Over Critical Temperature";
	$lang['display_status_event_11'] = "GFDI Locked";
	$lang['display_status_event_13'] = "Active Anti-island Protection";
	$lang['display_status_event_14'] = "CP Protection";
	$lang['display_status_event_15'] = "HV Protection";
	$lang['display_status_event_16'] = "Over Zero Protection";
	
	//显示数据库
	$lang['function_database'] = "Database";
	$lang['function_historical_data'] = "Historical_data";
	$lang['function_record'] = "Record";
	
/* 隐藏功能 */
	$lang['function_hidden_index'] = "Hidden Pages List";
	//debug
	$lang['function_debug'] = "Debug";
	$lang['debug_command_input'] = "Please enter a custom command";
	$lang['debug_command_execute'] = "Execute";
	$lang['debug_command_success'] = "Command Success";
	$lang['debug_command_failed'] = "Command Failed";	
	$lang['debug_command_is_null'] = "Command cannot be empty";	
	
	//导数据
	$lang['function_export_file'] = "Export Historical Data";
	$lang['export_file_start_time'] = "Start Time";
	$lang['export_file_end_time'] = "End Time";
	$lang['export_file_export'] = "Export";
	
	//EMA服务器地址与端口
        $lang['function_datacenter'] = "Datacenter";
	$lang['datacenter_domain'] = "Domain Name";
	$lang['datacenter_ip'] = "IP Address";
	$lang['datacenter_port1'] = "Port 1";
	$lang['datacenter_port2'] = "Port 2";
	$lang['datacenter_update'] = "Update";
	
	$lang['datacenter_result_0'] = "Server address and port has been modified";
	
	//自动更新服务器地址与端口
	$lang['function_updatecenter'] = "Updatecenter";
	$lang['updatecenter_domain'] = "Domain Name";
	$lang['updatecenter_ip'] = "IP Address";
	$lang['updatecenter_port'] = "Port";
	$lang['updatecenter_update'] = "Update";
	
	$lang['updatecenter_result_0'] = "Server address and port has been modified";

	//初始化数据库
	$lang['function_initialize'] = "Initialize the database";
	$lang['initialize_clear_energy'] = "Clear Energy";
	$lang['initialize_success'] = "Clear energy success";
	$lang['initialize_failed'] = "Clear energy failed";
	
	//串口
	$lang['function_serial'] = "Serial";
	$lang['serial_switch'] = "Switch";
	$lang['serial_switch_on'] = "On";
	$lang['serial_switch_off'] = "Off";
	$lang['serial_baud_rate'] = "Serial port baud rate";
	$lang['serial_ecu_address'] = "ECU address";
	$lang['serial_update'] = "Update";
	
	$lang['serial_result_0'] = "Serial has been modified";
	$lang['serial_result_1'] = "Serial modification fails";
	
	//电网环境
	$lang['function_grid_environment'] = "Grid Environment";
	$lang['grid_environment_result'] = "Result";
	$lang['grid_environment_setting'] = "Grid Environment";
	$lang['grid_environment_select'] = "--Select Grid Environment--";

	$lang['grid_environment_result_0'] = "Set Grid Environment Success";
	$lang['grid_environment_result_1'] = "Please Select Grid Environment";
	$lang['grid_environment_result_2'] = "Set Grid Environment Failed";
	
	//IRD控制
	$lang['function_ird'] = "IRD";
	$lang['ird_result'] = "Result";
	$lang['ird_setting'] = "IRD Mode";
	$lang['ird_select'] = "--Select IRD Mode--";
	$lang['ird_select_1'] = "Turn off IRD";
	$lang['ird_select_2'] = "Turn on IRD with locked";
	$lang['ird_select_3'] = "Turn on IRD without locked";
	
	$lang['ird_result_0'] = "Set IRD Mode Success";
	$lang['ird_result_1'] = "Please Select a IRD Mode";
	$lang['ird_result_2'] = "Set IRD Mode Failed";
	
	//逆变器信号强度
	$lang['function_signal_level'] = "Inverter Comm. Signal Level";
	$lang['signal_level'] = "Inverter Comm. Signal Level";
	
	$lang['signal_level_result_0'] = "Read Signal Level Success";
	$lang['signal_level_result_1'] = "Read Signal Level Failed";
	
	//上传文件到ECU临时目录
	$lang['function_upload'] = "Upload";
	$lang['upload_filename'] = "Filename";
	$lang['upload_browse'] = "Browse";
	
	$lang['upload_result_0'] = "Your file was successfully uploaded !";
	$lang['upload_result_1'] = "Your file was uploaded failed !";
	$lang['upload_result_2'] = "Please upload file less than 8Mb !";
	$lang['upload_result_3'] = "Your file was already exists!";
	
?>