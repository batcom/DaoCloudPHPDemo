<?php
/*========================================================================
#   FileName: common.php
#     Author: Httpd4
#      Email: xuheng@mdaxue.com
#   HomePage: http://www.mdaxue.com
# LastChange: 2013-06-03 15:38:02
========================================================================*/
/*
	Mdaxue所有项目都能用的公共函数库，如果不是公共的不要放在这里面
 */

/** =======================分割线============================ **/

function gbktoutf($string) {
	$string = charset_encode ( "gbk", "utf-8", $string );
	return $string;
}
function utftogbk($string) { 
	$string = charset_encode ( "utf-8", "gbk", $string );
	return $string;
}
function charset_encode($_input_charset, $_output_charset, $input) {
	$output = "";
			$string = $input;
	if (is_array ( $input )) {
		$key = array_keys ( $string );
		$size = sizeof ( $key );
		for($i = 0; $i < $size; $i ++) {
			$string [$key [$i]] = charset_encode ( $_input_charset, $_output_charset, $string [$key [$i]] );
		}
		return $string;
	} else {
		if (! isset ( $_output_charset ))
					$_output_charset = $_input_charset;
		if ($_input_charset == $_output_charset || $input == null) {
						$output = $input;
		} elseif (function_exists ( "mb_convert_encoding" )) {
			$output = mb_convert_encoding ( $input, $_output_charset, $_input_charset );
		} elseif (function_exists ( "iconv" )) {
			$output = iconv ( $_input_charset, $_output_charset, $input );
		} else
			die ( "sorry, you have no libs support for charset change." );
			return $output;
	}
}

function Pinyin($_String, $_Code='UTF8'){ //GBK页面可改为gb2312，其他随意填写为UTF8
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha". 
                        "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|". 
                        "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er". 
                        "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui". 
                        "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang". 
                        "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang". 
                        "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue". 
                        "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne". 
                        "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen". 
                        "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang". 
                        "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|". 
                        "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|". 
                        "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu". 
                        "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you". 
                        "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|". 
                        "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo"; 
        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990". 
                        "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725". 
                        "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263". 
                        "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003". 
                        "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697". 
                        "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211". 
                        "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922". 
                        "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468". 
                        "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664". 
                        "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407". 
                        "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959". 
                        "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652". 
                        "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369". 
                        "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128". 
                        "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914". 
                        "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645". 
                        "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149". 
                        "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087". 
                        "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658". 
                        "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340". 
                        "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888". 
                        "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585". 
                        "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847". 
                        "|-118  31|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055". 
                        "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780". 
                        "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274". 
                        "|-10270|-10262|-10260|-10256|-10254"; 
        $_TDataKey   = explode('|', $_DataKey); 
        $_TDataValue = explode('|', $_DataValue);
        $_Data = array_combine($_TDataKey, $_TDataValue);
    arsort($_Data);
    reset($_Data);
    $keyData = array_flip($_Data);
    if($_Code!= 'gb2312') $_String = _U2_Utf8_Gb($_String); 
    $_Res = ''; 
        for($i=0; $i<strlen($_String); $i++) { 
                $_P = ord(substr($_String, $i, 1));
                if($_P>160) { 
                        $_Q = ord(substr($_String, ++$i, 1)); $_P = $_P*256 + $_Q - 65536;
                } 
                $_Res .= _Pinyin($_P, $_Data); 
        } 
        return preg_replace("/[^a-z0-9]*/", '', $_Res); 
} 
function _Pinyin($_Num, $_Data){ 
        if($_Num>0 && $_Num<160 ){
                return chr($_Num);
        }elseif($_Num<-20319 || $_Num>-10247){
                return '';
        }else{ 
                foreach($_Data as $k=>$v){ if($v<=$_Num) break; } 
                return $k; 
        } 
}
function _U2_Utf8_Gb($_C){ 
        $_String = '';
        //var_dump($_C<0x80);
        if($_C < 0x80){
                $_String .= $_C;
        }elseif($_C < 0x800) { 
                $_String .= chr(0xC0 | $_C>>6); 
                $_String .= chr(0x80 | $_C & 0x3F); var_dump("2");
        }elseif($_C < 0x10000){ 
                $_String .= chr(0xE0 | $_C>>12); 
                $_String .= chr(0x80 | $_C>>6 & 0x3F); 
                $_String .= chr(0x80 | $_C & 0x3F); var_dump("3");
        }elseif($_C < 0x200000) { 
                $_String .= chr(0xF0 | $_C>>18); 
                $_String .= chr(0x80 | $_C>>12 & 0x3F); 
                $_String .= chr(0x80 | $_C>>6 & 0x3F); 
                $_String .= chr(0x80 | $_C & 0x3F); var_dump("4");
        } 
        return iconv('UTF-8', 'GB2312', $_String); 
}
/**
 * 过滤所有中英文标点符号
 * @param string $content 要过滤的字串
 */
function filter_special_chars($content){
    $content=urlencode($content);
    $content=preg_replace("/(%7E|%60|%21|%40|%23|%24|%25|%5E|%26|%27|%2A|%28|%29|%2B|%7C|%5C|%3D|\-|_|%5B|%5D|%7D|%7B|%3B|%22|%3A|%3F|%3E|%3C|%2C|\.|%2F|%A3%BF|%A1%B7|%A1%B6|%A1%A2|%A1%A3|%A3%AC|%7D|%A1%B0|%A3%BA|%A3%BB|%A1%AE|%A1%AF|%A1%B1|%A3%FC|%A3%BD|%A1%AA|%A3%A9|%A3%A8|%A1%AD|%A3%A4|%A1%A4|%A3%A1|%E3%80%82|%EF%BC%81|%EF%BC%8C|%EF%BC%9B|%EF%BC%9F|%EF%BC%9A|%E3%80%81|%E2%80%A6%E2%80%A6|%E2%80%9D|%E2%80%9C|%E2%80%98|%E2%80%99)+/",'',$content);
    $content=urldecode($content);
    return $content;
}


/**
 * Authenticates against the supplied adapter
 *
 * @param  $args POST或者GET传过来的字段值比如uid等
 * @param  $leve 执行的检查级别 1(默认严格检查)2只检查是否存在3只检查值是否为真
 * @return Result
 * @author httpd4
 * @time  2013-3-13    下午5:01:47
 */
function checkargs($args,$leve=1) {
	switch ($leve){
		default:
		case 1:
			if($_REQUEST[$args]&&isset($_REQUEST[$args])){
				return true;
			}
			break;
		case 3:
			if ($_REQUEST[$args]) {
				return true;
			}
		case 2:
			if (isset($_REQUEST[$args])) {
				return true;
			}
	}
}
/**
 如果没有登录的时候访问学校，且学校又没指定，则根据当前的用户访问ip
 获得所在城市的第一个学校
 */
function getDefaultCollegeid(){
	$cityInfo = Ip::find(get_client_ip());
	return empty($cityInfo['2'])?'武汉':$cityInfo['2'];
}

//公共登录验证,这里结合Nginx段lua脚本，直接获取用户信息,并返回
function getUser() {
    
    $auth = checkargs('auth') ? $_REQUEST['auth'] : '';
    list($uid) = empty($auth) ? array(0, 0, 0, 0) : addslashes_deep((explode("\t", authcode($auth, 'DECODE'))));
    if ($uid) {
        //手机端
        return array('uid' => $uid);
    } else {
        $keys = array('uid', 'collegeid', 'username', 'gender');
        if (empty($_SERVER['HTTP_LOGININFO'])) {
            return;
        } else { //这里因为手机端加密时候只使用了uid顾需要作兼容处理,否则array_combine会返回false
        	if (count( $userArray = explode("\t", $_SERVER['HTTP_LOGININFO']))>1) {
        		return array_combine($keys, $userArray);
        	}
        	return array('uid' => $userArray['0']);
        }
    }
}
/**
 * random
 * @param int $length
 * @return string $hash
 */
function random($length=6,$type=0) {
	$hash = '';
	$chararr =array(
			'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz',
			'0123456789',
			'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	);
	$chars=$chararr[$type];
	$max = strlen($chars) - 1;
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

// 获取字符串扩展名
function getExtent($string){
	$arr = explode('.', $string);
	if (count($arr) >1)
		return end($arr); 
}
 //生成唯一订单号

function build_order_no($cutNum=16,$type=0)
{
	srand(microtime(TRUE) * 999999999999);
	$unique_string = sha1(uniqid().uniqid(mt_rand(100000000000,999999999999)));
	 
	$unique_id = '';
	 
	for($i=0,$j=strlen($unique_string);$i<$j;$i++)
	{
	$unique_id .= ord($unique_string{$i});
	}
	 
	return $type==0?substr(date('Ymd').$unique_id,0,$cutNum):substr($unique_id,0,$cutNum);
}

function getGUID(){
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$uuid = substr($charid, 0, 8)
		.substr($charid, 8, 4)
		.substr($charid,12, 4)
		.substr($charid,16, 4)
		.substr($charid,20,12)
		.chr(125);
		return $uuid;
}
function gsetcookie($var, $value, $life = 0) {
	$domain=".mdaxue.com";
	$cookiepre='md_';
	setcookie($cookiepre.$var, $value,$life ? time() + $life : 0, '/',$domain, $_SERVER['SERVER_PORT'] == 443 ? 1 : 0);
}

function hsetcookie($var, $value, $life = 0) {
	$domain='';
	$cookiepre='md_';
	setcookie($cookiepre.$var, $value,$life ? time() + $life : 0, '/',$domain, $_SERVER['SERVER_PORT'] == 443 ? 1 : 0);
}

function hgetcookie($var) {
	$cookiepre='md_';
	return $_COOKIE[$cookiepre.$var];
}
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
		$ckey_length = 4;
		$key = md5($key ? $key : C('AUTH_KEY'));
		$keya = md5(substr($key, 0, 16));
		$keyb = md5(substr($key, 16, 16));
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
		$cryptkey = $keya.md5($keya.$keyc);
		$key_length = strlen($cryptkey);
		$string = $operation == 'DECODE' ? base64_url_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
		$string_length = strlen($string);
		$result = '';
		$box = range(0, 255);
		$rndkey = array();
		for($i = 0; $i <= 255; $i++) {
			$rndkey[$i] = ord($cryptkey[$i % $key_length]);
		}
		for($j = $i = 0; $i < 256; $i++) {
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}

		for($a = $j = $i = 0; $i < $string_length; $i++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}
		if($operation == 'DECODE') {
			if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
				return substr($result, 26);
			} else {
				return '';
			}
		} else {
			return $keyc.base64_url_encode($result);
		}
	}

	function base64_url_encode($string) {
		$raw = base64_encode($string);
		$raw = str_replace('+','_',$raw);
		$raw = str_replace('/','-',$raw);
		$raw = str_replace('=','.',$raw);
		return $raw;
	}

	function base64_url_decode($string) {
		$string = str_replace('_','+',$string);
		$string = str_replace('-','/',$string);
		$string = str_replace('.','=',$string);
		return base64_decode($string);
	}


/**
 * 递归方式的对变量中的特殊字符进行转义
 *
 * @access  public
 * @param   mix     $value
 *
 * @return  mix
 */
function addslashes_deep($value)
{
    if (empty($value))
    {
        return $value;
    }
    else
    {
        return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
    }
}

function flog(){
	$args = func_get_args();
	foreach ($args as $obj){
		$obj ==='die' && die;
		fb::log($obj);
	}
	return true;
}

function mlog(){
	$args = func_get_args();
	foreach ($args as $arg){
		file_put_contents('debug.txt', var_export($arg,true)."\n",FILE_APPEND);
	}
}

function writetofile($filename,&$data,$type=0){
	//$type为0时,写文件不追加.为1是,写文件追加
	$wtype = $type?'ab':'wb';
	if($fp=@fopen($filename,$wtype)){
		if (PHP_VERSION >='4.3.0' && function_exists('file_put_contents')) {
			if($type){
				return @file_put_contents($filename,$data,FILE_APPEND);
			}else{
				return @file_put_contents($filename,$data);
			}


		}else{
			flock($fp, LOCK_EX);
			$bytes=fwrite($fp, $data);
			flock($fp,LOCK_UN);
			fclose($fp);
			return $bytes;
		}
	}else{
		return 0;
	}
}
function https_request($url,$data=null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	if(!empty($data)){
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	$message = json_decode($output,true);
	return $message;
}

function curl_request($url, $postfields = NULL,$method = "get") {
	$ci = curl_init ();
	curl_setopt ( $ci, CURLOPT_URL, $url );
	curl_setopt ( $ci, CURLOPT_HEADER, FALSE );
	curl_setopt ( $ci, CURLOPT_RETURNTRANSFER, TRUE );
	curl_setopt ( $ci, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
	curl_setopt ( $ci, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt ( $ci, CURLOPT_SSL_VERIFYHOST, 0 );
	if ('post' == strtolower ( $method )) {
		curl_setopt ( $ci, CURLOPT_POST, TRUE );
		if (is_array ( $postfields )) {
			$field_str = "";
			foreach ( $postfields as $k => $v ) {
				$field_str .= "&$k=" . urlencode ( $v );
			}
			curl_setopt ( $ci, CURLOPT_POSTFIELDS, $field_str );
		}
	}
	$response = curl_exec ( $ci );
	if (curl_errno ( $ci )) {
		throw new Exception ( curl_error ( $ci ), 0 );
	} else {
		$httpStatusCode = curl_getinfo ( $ci, CURLINFO_HTTP_CODE );
		if ($httpStatusCode>400) {
			throw new Exception ( $response, $httpStatusCode );
		}
	}
	curl_close ( $ci );
	return $response;
}

function xml_to_array($xml){
	$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
	if(preg_match_all($reg, $xml, $matches)){
		$count = count($matches[0]);
		for($i = 0; $i < $count; $i++){
			$subxml= $matches[2][$i];
			$key = $matches[1][$i];
			if(preg_match( $reg, $subxml )){
				$arr[$key] = xml_to_array( $subxml );
			}else{
				$arr[$key] = $subxml;
			}
		}
	}
	return $arr;
}

function sendsms($phone,$type='verification'){
	$sms_postUrl="http://106.ihuyi.cn/webservice/sms.php?method=Submit&account=cf_mdaxue&password=720409fa720521&mobile=$phone&content=";
	#短信中心发送短信报备模板
	$template = array('menu'=>'您的预约菜单是：【变量】总计：【变量】',
	'register' =>'欢迎注册Mdaxue网,您的激活验证码为【变量】',
	'verification' =>'您的验证码是：【变量】。欢迎您使用[我的大学网]！如非您本人操作，可忽略本短信。',
	);
	switch ($type){
		case 'register':
			break;
		case 'menu':
			break;
		default:{
			$url = $sms_postUrl.rawurlencode(str_replace('【变量】', $vcode= build_order_no(6,1), $template['verification']));
			$resJson = xml_to_array(curl_request($url));
			$resJson['vcode'] = $vcode; #vcode为发送的验证码
			return $resJson['SubmitResult']; #code =2 为成功
		}
			break;
	}
	return ;
}


/*
 *  通过经纬度来获取城市信息
*  @param $latitude 纬度
*  @param $longitude 经度
*  return array {"city":"武汉市","country":"中国","direction":"附近","distance":"16","district":"汉阳区","province":"湖北省","street":"龙灯堤","street_number":"65-17号","country_code":0}
*/

function getGeoInfoByPoint($latitude,$longitude){
	$url = "http://api.map.baidu.com/geocoder/v2/?ak=E37df51e20eb9d4c3f8b04af9807516a&location=$latitude,$longitude&output=json";
	return json_decode(curl_request($url),16);
}

function hstripslashes($string) {
	if(is_array($string)){
		while(@list($key,$var) = @each($string)) {
			if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
				if (is_string($var)) {
					$string[$key] = stripslashes($var);
				}
				if (is_array($var))  {
					$string[$key] = hstripslashes($var);
				}
			}
		}
	}else{
		$string=stripslashes($string);
	}
	return $string;
}

function haddslashes($string, $force = 0) {
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = haddslashes($val, $force);
			}
		}else {
			$string = addslashes($string);
		}
	}
	return $string;
}

/********************支付宝支付相关函数************************
/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstring($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstringUrlencode($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".urlencode($val)."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}
/**
 * 除去数组中的空值和签名参数
 * @param $para 签名参数组
 * return 去掉空值与签名参数后的新签名参数组
 */
function paraFilter($para) {
	$para_filter = array();
	while (list ($key, $val) = each ($para)) {
		if($key == "sign" || $key == "sign_type" || $val == "")continue;
		else	$para_filter[$key] = $para[$key];
	}
	return $para_filter;
}
/**
 * 对数组排序
 * @param $para 排序前的数组
 * return 排序后的数组
 */
function argSort($para) {
	ksort($para);
	reset($para);
	return $para;
}
/**
 * 写日志，方便测试（看网站需求，也可以改成把记录存入数据库）
 * 注意：服务器需要开通fopen配置
 * @param $word 要写入日志里的文本内容 默认值：空值
 */
function logResult($word='') {
	$fp = fopen("log.txt","a");
	flock($fp, LOCK_EX) ;
	fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}

/**
 * 远程获取数据，POST模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * @param $para 请求的数据
 * @param $input_charset 编码格式。默认值：空值
 * return 远程输出的数据
 */
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '') {

	if (trim($input_charset) != '') {
		$url = $url."_input_charset=".$input_charset;
	}
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
	curl_setopt($curl,CURLOPT_POST,true); // post传输数据
	curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post传输数据
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
	curl_close($curl);
	
	return $responseText;
}

/**
 * 远程获取数据，GET模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * @param $cacert_url 指定当前工作目录绝对路径
 * return 远程输出的数据
 */
function getHttpResponseGET($url,$cacert_url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
	$responseText = curl_exec($curl);
	//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
	curl_close($curl);
	
	return $responseText;
}

/**
 * 实现多种字符编码方式
 * @param $input 需要编码的字符串
 * @param $_output_charset 输出的编码格式
 * @param $_input_charset 输入的编码格式
 * return 编码后的字符串
 */
function charsetEncode($input,$_output_charset ,$_input_charset) {
	$output = "";
	if(!isset($_output_charset) )$_output_charset  = $_input_charset;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset change.");
	return $output;
}
/**
 * 实现多种字符解码方式
 * @param $input 需要解码的字符串
 * @param $_output_charset 输出的解码格式
 * @param $_input_charset 输入的解码格式
 * return 解码后的字符串
 */
function charsetDecode($input,$_input_charset ,$_output_charset) {
	$output = "";
	if(!isset($_input_charset) )$_input_charset  = $_input_charset ;
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")) {
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	} else die("sorry, you have no libs support for charset changes.");
	return $output;
}

/**
 * 签名字符串
 * @param $prestr 需要签名的字符串
 * @param $key 私钥
 * return 签名结果
 */
function md5Sign($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}

/**
 * 验证签名
 * @param $prestr 需要签名的字符串
 * @param $sign 签名结果
 * @param $key 私钥
 * return 签名结果
 */
function md5Verify($prestr, $sign, $key) {
	$prestr = $prestr . $key;
	$mysgin = md5($prestr);

	if($mysgin == $sign) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * RSA签名
 * @param $data 待签名数据
 * @param $private_key_path 商户私钥文件路径
 * return 签名结果
 */
function rsaSign($data, $private_key_path) {
	$priKey = file_get_contents($private_key_path);
	$res = openssl_get_privatekey($priKey);
	openssl_sign($data, $sign, $res);
	openssl_free_key($res);
	//base64编码
	$sign = base64_encode($sign);
	return $sign;
}

/**
 * RSA验签
 * @param $data 待签名数据
 * @param $ali_public_key_path 支付宝的公钥文件路径
 * @param $sign 要校对的的签名结果
 * return 验证结果
 */
function rsaVerify($data, $ali_public_key_path, $sign)  {
	$pubKey = file_get_contents($ali_public_key_path);
	$res = openssl_get_publickey($pubKey);
	$result = (bool)openssl_verify($data, base64_decode($sign), $res);
	openssl_free_key($res);
	return $result;
}

/**
 * RSA解密
 * @param $content 需要解密的内容，密文
 * @param $private_key_path 商户私钥文件路径
 * return 解密后内容，明文
 */
function rsaDecrypt($content, $private_key_path) {
	$priKey = file_get_contents($private_key_path);
	$res = openssl_get_privatekey($priKey);
	//用base64将内容还原成二进制
	$content = base64_decode($content);
	//把需要解密的内容，按128位拆开解密
	$result  = '';
	for($i = 0; $i < strlen($content)/128; $i++  ) {
		$data = substr($content, $i * 128, 128);
		openssl_private_decrypt($data, $decrypt, $res);
		$result .= $decrypt;
	}
	openssl_free_key($res);
	return $result;
}
/********************支付宝支付相关函数*************************/