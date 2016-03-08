<?php
class HomeCommonAction extends Action{
public function __construct()
{
  parent::__construct();
  $url=($_SERVER['PATH_INFO']);
  session_start();
  if(empty($_SESSION['UserInfo']))
  {
    redirect("/Auth/auth?url={$url}");
  }
}

}