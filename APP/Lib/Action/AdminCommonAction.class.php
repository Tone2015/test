<?php
class AdminCommonAction extends Action {
	public function __construct(){
		parent::__construct();
		session_start();
		$admin = $_SESSION['ADMININFO'];
		if($admin==null || $admin==""){
			$this->redirect("/Admin/Login/login");
		}
	}
}