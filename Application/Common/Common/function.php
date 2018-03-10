<?php 

/**
 * 判断当前用户是否在其他设备登录
 * @return bool true 在其他设备登录 false 正常
 */
function check_replay_login() {
	if (isset($_SESSION['me']['replay_login'])) {
		return true;
	} else {
		return false;
	}
}

/**
 * 处理其他用户session
 * @param  array $user_session 之前用户session
 * @return bool
 */
function handle_user_session($user_session) {
	$sessionpath = session_save_path();
	$user_sessionfile = $sessionpath."/sess_".$user_session['session_id'];
	$activetime = file_exists($user_sessionfile) ? intval(filemtime($user_sessionfile)) : 0;
	if ($activetime) {
		$time_length = $activetime - $user_session['last_login_time'];
	} else if($user_session['last_logout_time'] > $user_session['last_login_time']) {
		$time_length = $user_session['last_logout_time'] - $user_session['last_login_time'];
	} else {
		$time_length = 1800;
	}
	//if ($user_session['session_id']) {
	//	D('User')->where(array('id'=>$user_session['user_id']))->setDec('time_length',$time_length);
	//}
	
	$content = file_get_contents($user_sessionfile);
	if ($content) {
		$session_data = 'me|'.serialize(array('replay_login'=>1));
		file_put_contents($user_sessionfile, $session_data);
	}
	return true;
}

/**
 * 设置cookie
 * @return bool
 */
function scookie($name,$value){
	$value = json_encode($value);
	cookie($name,$value);
	return true;
}
/**
 * 获取cookie
 * @return array value
 */
function gcookie($name){
	$value = cookie($name);
	return json_decode($value, true);
}

function is_mobile_request()   
{   
	$_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';   
		$mobile_browser = '0';   
	if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))   
		$mobile_browser++;   
	if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))   
		$mobile_browser++;   
	if(isset($_SERVER['HTTP_X_WAP_PROFILE']))   
		$mobile_browser++;   
	if(isset($_SERVER['HTTP_PROFILE']))   
		$mobile_browser++;   
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));   
	$mobile_agents = array(   
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',   
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',   
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',   
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',   
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',   
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',   
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',   
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',   
		'wapr','webc','winw','winw','xda','xda-'  
		);   
	if(in_array($mobile_ua, $mobile_agents))   
		$mobile_browser++;   
	if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)   
		$mobile_browser++;   
	// Pre-final check to reset everything if the user is on Windows   
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)   
		$mobile_browser=0;   
	// But WP7 is also Windows, with a slightly different characteristic   
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)   
		$mobile_browser++;   
	if($mobile_browser>0)   
		return true;   
	else 
		return false;   
}

/**
 * 读取excel内容
 * @param  string $name 文件名
 * @return array   $data['row']['colum']
 */
function readExcel($name,$page=0){
	include "./Application/Common/Vendor/PHPExcel/IOFactory.php";
	$objPHPExcel = \PHPExcel_IOFactory::load($name);
	$sheets = $objPHPExcel->getAllSheets(); 
	$sheetsinfo = array(); 
	$sheetData = array(); 
	$sheet = $sheets[$page]; 
	$sheetsinfo["rows"] = $sheet->getHighestRow(); 

	for($row=1;$row<=$sheetsinfo["rows"];$row++){ 
		for($column=0;$column<13;$column++){ 
			$sheetData[$row][$column] = (string)$sheet->getCellByColumnAndRow($column, $row)->getValue(); 
		} 
	}
	return $sheetData;
}

function uploadFile($pic,$path){
	$upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg', 'xls');// 设置附件上传类型
    $upload->rootPath  =     './Public/'; // 设置附件上传根目录
    $upload->savePath  =     $path.'/'; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    $pic_url = $info[$pic]['savepath'].$info[$pic]['savename'];
    return $pic_url;
}
