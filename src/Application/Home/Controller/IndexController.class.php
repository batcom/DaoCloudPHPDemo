<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    
    public function wx(){
    	/* 加载微信SDK */
    	$weixin = new \Org\Util\ThinkWechat('coolnet');
    	
    	/* 获取请求信息 */
    	$data = $weixin->request();
    	
    	/* 获取回复信息 */
    	// 这里的回复信息是通过判断请求内容自行定制的， 不在 SDK范围内，请自行完成
    	list($content,$type) = $this->reply($data);;
    	/* 响应当前请求 */
    	$weixin->response($content, $type);
    }
    
    private function text($data){
    	$content = $data['Content'];
    	$ToUserName = $data['ToUserName'];
    	$createTime = $data['CreateTime'];
    	$openid = $data['FromUserName'];
    	$templateTxt = "<xml>
<ToUserName>$openid</ToUserName>
<FromUserName>$ToUserName</FromUserName>
<CreateTime>$createTime</CreateTime>
<MsgType>text</MsgType>
<Content>$content</Content>
</xml>
    	";
    	return $templateTxt;
    }
    
    
    private function reply($data){
    	$reply=array("扫描出错，请再扫一次！", 'text');
    	if('text' == $data['MsgType']){
    		$this->text($data);
    		$reply = array($data['Content'], 'text');
    	} elseif('event' == $data['MsgType']){
    		if('subscribe' == $data['Event']){
    			$userinfo = $this->getUserInfo($data['FromUserName']);
    			$userinfo['ticket'] = $data['Ticket'];
    			$result = $this->registerOrLogin($userinfo);
    			$reply = array($result, 'text');
    		}elseif ('unsubscribe'==$data['Event']){ #取消关注
    			$UserOpenidModel = M('user_openids',null,'DB_ACCOUNTS');
    			$UserOpenidModel->where(array('openid'=>$data['FromUserName']))->delete();
    		}else if('SCAN' == $data['Event']){
    			$userinfo = $this->getUserInfo($data['FromUserName']);
    			$userinfo['ticket'] = $data['Ticket'];
    			$result = $this->registerOrLogin($userinfo);
    			$reply = array($result, 'text');
    		}else if("CLICK"==$data['Event']){
    			if (empty($this->user['uid'])) {
    				return "您已成功关注了我的大学网，请点击补充信息完成注册，<a href='http://public.mdaxue.com/index.php?g=Public&m=Weixin&a=weixinLogin&uid=$userid&ticket=$ticket'>点击补充</a>";
    			}
    			switch ($data['EventKey'])
    			{
    					case "bindlogin":
    					header("Location:http://www.mdaxue.com");
    					break;
    					default:
    					header("Location:http://www.mdaxue.com");
    					break;
    					}
    					}
    					} elseif($data['MsgType']=='image'){
    					exit;
    					} elseif($data['MsgType']=='location'){
    					exit;
    					} elseif($data['MsgType']=='link'){
    					exit;
    	} else{
    	exit;
    		}
		return $reply;
    	}

    public function get(){
        var_dump(M('admin_user')->select());
        echo var_export(M('admin_user')->select());
        die;

    }
    
    public function sqlite(){
    	var_dump(get_included_files());die;
    	var_dump(M('college')->select());die;
    }

    public function ip(){
        echo "ip:",get_client_ip();
        echo var_export(($_SERVER));
        die;
    }

    public function php(){
        phpinfo();
    }

    public function task(){
        var_dump(file_put_contents('task.txt', $_GET['time']));
    }

}