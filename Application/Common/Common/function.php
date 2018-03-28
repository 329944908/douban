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

function sendEmail($revice,$token){
		//引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
		require_once("./Public/email/PHPMailer.php"); 
		require_once("./Public/email/SMTP.php");
		require_once("./Public/email/Exception.php");
		//示例化PHPMailer核心类
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		 
		//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
		$mail->SMTPDebug = 0;
		 
		//使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
		//可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
		$mail->isSMTP();
		//smtp需要鉴权 这个必须是true
		$mail->SMTPAuth=true;
		//链接qq域名邮箱的服务器地址
		$mail->Host = 'smtp.qq.com';
		//设置使用ssl加密方式登录鉴权
		$mail->SMTPSecure = 'ssl';
		//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
		$mail->Port = 465;
		//设置smtp的helo消息头 这个可有可无 内容任意
		$mail->Helo = 'Hello smtp.qq.com Server';
		//设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
		$mail->Hostname = 'test.com';
		//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
		$mail->CharSet = 'UTF-8';
		//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
		$mail->FromName = 'YYX';
		//smtp登录的账号 这里填入字符串格式的qq号即可
		$mail->Username ='329944908';
		//smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
		$mail->Password = 'rcpdqdblrswybgfh';
		//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
		$mail->From = '329944908@qq.com';
		//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
		$mail->isHTML(true); 
		//设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
		$mail->addAddress("{$revice}",'Hi');
		//添加多个收件人 则多次调用方法即可
		//$mail->addAddress('xxx@163.com','晶晶在线用户');
		//添加该邮件的主题
		$mail->Subject = 'TPShop商城';
		//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
		$url = "http://ebay.com/User/activate_mailbox?token={$token}";
		$mail->Body = "
				<div>
				<h2 >欢迎注册TPShop商城</h2>
				<p>点击下面链接即可激活账号</p>
				<a href='{$url}'>{$url}</a>
				<p></p>
				</div>
			";
		//为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
		//$mail->addAttachment('./d.jpg','mm.jpg');
		//同样该方法可以多次调用 上传多个附件
		//$mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
		 
		 
		//发送命令 返回布尔值 
		//PS：经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效
		$status = $mail->send();
		 
		//简单的判断与提示信息
		return $status;
	}
	//php获取中文字符拼音首字母
function getFirstCharter($str){
      if(empty($str))
      {
            return '';          
      }
      $fchar=ord($str{0});
      if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
      $s1=iconv('UTF-8','gb2312',$str);
      $s2=iconv('gb2312','UTF-8',$s1);
      $s=$s2==$str?$s1:$str;
      $asc=ord($s{0})*256+ord($s{1})-65536;
     if($asc>=-20319&&$asc<=-20284) return 'A';
     if($asc>=-20283&&$asc<=-19776) return 'B';
     if($asc>=-19775&&$asc<=-19219) return 'C';
     if($asc>=-19218&&$asc<=-18711) return 'D';
     if($asc>=-18710&&$asc<=-18527) return 'E';
     if($asc>=-18526&&$asc<=-18240) return 'F';
     if($asc>=-18239&&$asc<=-17923) return 'G';
     if($asc>=-17922&&$asc<=-17418) return 'H';
     if($asc>=-17417&&$asc<=-16475) return 'J';
     if($asc>=-16474&&$asc<=-16213) return 'K';
     if($asc>=-16212&&$asc<=-15641) return 'L';
     if($asc>=-15640&&$asc<=-15166) return 'M';
     if($asc>=-15165&&$asc<=-14923) return 'N';
     if($asc>=-14922&&$asc<=-14915) return 'O';
     if($asc>=-14914&&$asc<=-14631) return 'P';
     if($asc>=-14630&&$asc<=-14150) return 'Q';
     if($asc>=-14149&&$asc<=-14091) return 'R';
     if($asc>=-14090&&$asc<=-13319) return 'S';
     if($asc>=-13318&&$asc<=-12839) return 'T';
     if($asc>=-12838&&$asc<=-12557) return 'W';
     if($asc>=-12556&&$asc<=-11848) return 'X';
     if($asc>=-11847&&$asc<=-11056) return 'Y';
     if($asc>=-11055&&$asc<=-10247) return 'Z';
     return null;
}

/**
 * 获取整条字符串汉字拼音首字母
 * @param $zh
 * @return string
 */
function pinyin_long($zh){
    $ret = "";
    $s1 = iconv("UTF-8","gb2312", $zh);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $zh){$zh = $s1;}
    for($i = 0; $i < strlen($zh); $i++){
        $s1 = substr($zh,$i,1);
        $p = ord($s1);
        if($p > 160){
            $s2 = substr($zh,$i++,2);
            $ret .= getFirstCharter($s2);
        }else{
            $ret .= $s1;
        }
    }
    return $ret;
}
/**
 * 获取数组中的某一列
 * @param array $arr 数组
 * @param string $key_name  列名
 * @return array  返回那一列的数组
 */
function get_arr_column($arr, $key_name)
{
	$arr2 = array();
	foreach($arr as $key => $val){
		$arr2[] = $val[$key_name];        
	}
	return $arr2;
}