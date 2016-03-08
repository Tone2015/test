<?php
class LoginAction extends Action {
	
	public function checklogin(){
		session_start();
		$name=$_POST['name'];
		$password=$_POST['password'];
		$admin = M('admin')->where("name='%s' and pass='%s'",array($name,$password))->select();
		if($admin && count($admin)==1){
			$_SESSION['ADMININFO']=$admin;
			$this->success("登陆成功！","/Admin/Index/index");
		}else{
			$this->error("用户名或密码错误！");
		}
	}
	public function adminexit(){
	session_start();
	$_SESSION['ADMININFO']=null;
	$this->redirect("/Admin/Login/login");
	}
}