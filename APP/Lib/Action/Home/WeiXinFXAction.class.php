<?php
class WeiXinFXAction extends Action{
public function __construct(){
parent::__construct();
import("@.Util.jssdk");
	}
     public function test()
{
$jssdk = new JSSDK(C("appid"), C("appsecret"));
$signPackage = $jssdk->GetSignPackage($_GET["url"]);
$this->ajaxReturn($signPackage);
}
public function download()
{
	$url=I("url");
	$jssdk = new JSSDK(C("appid"), C("appsecret"));
	$token=$jssdk->getAccessToken();
	$url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$token."&media_id=".$url;
	$return_content = $this->http_get_data($url);  
	if(!empty($return_content))
	{
    $filename = "upload/".time().".jpg";  
    $fp= @fopen($filename,"a"); 
    fwrite($fp,$return_content);
    $data['url']=$filename;
	$this->ajaxReturn($data);
	}
}
function http_get_data($url) {  
          
        $ch = curl_init ();  
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );  
        curl_setopt ( $ch, CURLOPT_URL, $url );  
        ob_start ();  
        curl_exec ( $ch );  
        $return_content = ob_get_contents ();  
        ob_end_clean ();    
        $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );  
        return $return_content;  
    }  
}
?>