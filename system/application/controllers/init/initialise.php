<?php

//benchmarking on
//WARNING: TURNING THIS ON PRODUCTION SERVER WILL BREAK ALL REMOTE XML TRANSFER INCLUDING FLOGGER AND FLIGHTMAP!

//restricted to Alexander
if (isset($this->session->userdata['username']) && $this->session->userdata['username'] == '1997') {
    $this->output->enable_profiler(TRUE);
}

//Global initialisation file
$data['version'] = '2.0';

//cache in minutes
$cache_duration_normal = 5;

//load all required libraries
$this->load->library('View_fns');

$this->load->library('form_validation');
$this->load->helper('security');

//grab useful variables
$data['time_unix'] = time();
$data['time_mysql'] = gmdate("Y-m-d H:i:s", $data['time_unix']);
$data['base_url'] = $this->config->item('base_url') . $this->config->item('index_page') . '/';
$data['base_url_minimal'] = $this->config->item('base_url');
$data['tmpl_global_url'] = $this->config->item('base_url') . 'system/application/views/global/';
$data['assets_url'] = $this->config->item('base_url') . 'assets/';
$data['assets_path'] = $this->config->item('base_path') . 'assets/';
$data['flash_url'] = $this->config->item('base_url') . 'assets/swf/';
$data['base_path'] = $this->config->item('base_path');
$data['template'] = $this->config->item('template');

/*
//handle mobile skin vs normal
if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match("/iphone|Android|Blackberry/i", $_SERVER['HTTP_USER_AGENT'])) { 
	$data['template'] = 'mobile'; 
}
*/

include_once($this->config->item('full_base_path') . 'system/application/views/templates/' . $data['template'] . '/template_config.php');

//reCAPTCHA
$data['recaptcha_public'] = $this->config->item('recaptcha_public');
$data['recaptcha_private'] = $this->config->item('recaptcha_private');

//logged in
//$data['logged_in'] = $this->session->userdata('logged_in');

//tmp upload path
$tmp_upload_path = $data['base_path'] . 'assets/uploads/tmp/';
$data['tmp_upload_path'] = $tmp_upload_path;

//set defaults
$data['col2'] = '';
$data['menu_main'] = '';

//grab config data
$data['flash_vars'] = '';

//template data
$data['image_url'] = $this->config->item('base_url') . 'assets/images/';
$data['tmpl_image_url'] = $this->config->item('base_url') . 'assets/images/templates/' . $data['template'] . '/';
$data['image_path'] = $data['base_path'] . 'assets/images/';
$data['tmpl_global_path'] = $data['base_path'] . 'system/application/views/global/';
$data['tmpl_main_width'] = $data['tmpl_cont_width'] - $data['tmpl_menu_width'] - ($data['tmpl_main_padding'] * 2);
$data['full_base_url'] = $data['base_url'] . $this->config->item('index_page');
$data['full_base_path'] = $data['base_path'] . 'index.php';
$data['view_base_path'] = $data['base_path'] . 'system/application/views/';

//time
//these are inactive compares
$pp_compare_date = gmdate('Y-m-d', strtotime('-2 days'));
$month_compare_date = gmdate('Y-m-d', strtotime('-1 month'));
$active_compare_date = gmdate('Y-m-d', strtotime('-90 days'));
$active_compare_datetime = gmdate('Y-m-d h:m:s', strtotime('-90 days'));
$ppstats_compare_datetime = gmdate('Y-m-d h:m:s', strtotime('-90 days'));

$data['pp_compare_date'] = $pp_compare_date;
$data['month_compare_date'] = $month_compare_date;
$data['active_compare_date'] = $active_compare_date;
$data['active_compare_datetime'] = $active_compare_datetime;


//sql insert
$gmt_mysql_datetime = gmdate("Y-m-d H:i:s", time());
$data['gmt_mysql_datetime'] = $gmt_mysql_datetime;
//admincp timeout
$acp_timeout = (60 * 90);
//javascript
$data['js_loader'] = '';

$featured_video_array = array(
    'http://www.youtube.com/v/uO5z_FmR5No',
    'http://www.youtube.com/v/NYOjrqbxydQ',
    'http://www.youtube.com/v/gHVgwpUyJBU',
    'http://www.youtube.com/v/qeh4mDmCPqw',
    'http://www.youtube.com/v/LIkE2o-ghjA',
    'http://www.youtube.com/v/tJ8uXhkchI0',
    'http://www.youtube.com/v/tPomU9_8WAo',
    'http://www.youtube.com/v/5rlkkPTuC4A',
    'http://www.youtube.com/v/sCfDl0tc_SE',
    'http://www.youtube.com/v/kmetbvY-Vg0',
    'http://www.youtube.com/v/JZ24olrnRGU',
    'http://www.youtube.com/v/g_aCS5Cjcvg',
    'http://www.youtube.com/v/xc6EGuq8F-E',
    'http://www.youtube.com/v/cQWwKiQHmV8',
    'http://www.youtube.com/v/zzAD0HTvcus',
    'http://www.youtube.com/v/Ggz4u647YD0',
    'http://www.youtube.com/v/S5JHPES1CyA',
    'http://www.youtube.com/v/Q0ZGdvox6No',
    'http://www.youtube.com/v/aoq0ChqtcSw',
    'http://www.youtube.com/v/Kzo7u3cnrBc',


);

//overwrite to feature the anniversary vid
/*
$featured_video_array = array(
'http://www.youtube.com/v/Kzo7u3cnrBc',
);
*/

$data['flogger_latest'] = 'http://www.fly-euroharmony.com/forum/index.php?action=media;sa=media;in=1275;dl';
$data['ops_manual_link'] = 'http://www.fly-euroharmony.com/site/assets/files/manuals/ehm_ops_manual_2012.pdf';

$data['flogger_version'] = '4.1.8';


//load libraries
$this->load->library('Format_fns');
?>
