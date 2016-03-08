<?php
class AuthAction extends Action{
public function auth()
{
	$url=I("url");
	$this->url=$url;
    $this->display();
}
public function addUser()
{
$openid=I("openid");
if(!empty($openid))
{
$model=M("user");
$info=$model->where("openid='{$openid}'")->find();
if(empty($info))
{
$model->create();
if($model->add())
{
	//$data['openid']=I("openid");
	//$data['nickname']=I("nickname");
	//$data['headimgurl']=I("headimgurl");
	$nowUser=$model->where("openid='{$openid}'")->find();
	session_start();
	$_SESSION['UserInfo']=$nowUser;
    $this->success("ok");
}
else
$this->error("no");
}
else 
{
	session_start();
$_SESSION['UserInfo']=$info;
$this->success("ok");
}

}


}
public function test()
{
	$btp="oXwlNuEU-Eiy8H9Xj5ydF15RqJfE";
    $model_user=M("user");
    $array=$model_user->field("openid,name,count")->where("name !=''")->order("count desc")->select();
    $flag=-1;
    for ($i=0;$i<count($array);$i++)
    {
      if($array[$i]['openid']==$btp)
      {
      	$flag=$i;
      }
      $array[$i]['pm']=$i+1;
    }
    dump($array);
    dump($array[$flag]);
}
}