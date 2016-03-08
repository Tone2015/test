<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends HomeCommonAction {
	//报名页面
    public function index(){
    	session_start();
    	$data=$_SESSION["UserInfo"];
    	$this->data=$data;
	    $this->display();
    }
    //提交报名数据
    public function submitData()
    {
    $name=I("name");
    $age=I("age");
    $parentname=I("parentname");
    $phone=I("phone");
    $imgUrl=I("imgUrl");
    if(empty($name)||empty($age)||empty($parentname)||empty($phone))
    {
    	$this->error("参数错误");
    }
    else
    {
    $model=M("user");
    session_start();
    $data=$_SESSION['UserInfo'];
    $nowId=$data['openid'];
    $newData=$model->where("openid='{$nowId}'")->find();
    if($newData['isUpload']==1)
    {
    $this->error("已经提交过了");
    }
    else {
    $newData['name']=$name;
    $newData['phone']=$phone;
    $newData['age']=$age;
    $newData['parentname']=$parentname;
    $newData['imgUrl']=$imgUrl;
    $newData['isUpload']=1;
    if($model->save($newData)!==false)
    {
    	$newDataSession=$model->where("openid='{$nowId}'")->find();
    	session_start();
    	$_SESSION['UserInfo']=$newDataSession;
    $this->success("ok");
    }
    else
    $this->error("no");
    }
    }
    
    }
    //投票页面
    public function tp(){
    session_start();
    $model=M("tp");
    $btp=I("openid");
    $user=$_SESSION['UserInfo'];
    $tp=$user['openid'];
    $isTp=$model->where("tpid='{$tp}' and btpid='{$btp}'")->find();
    if(empty($isTp))
    {
    $this->isTp=0;
    }
    else 
    {
    $this->isTp=1;
    }
    $this->btp=$btp;
    $model_user=M("user");
    $array=$model_user->field("openid,name,count,imgUrl")->where("name !=''")->order("count desc")->select();
    $flag=0;
    for ($i=0;$i<count($array);$i++)
    {
    	
      if($array[$i]['openid']==$btp)
      {
      	$flag=$i;
      }
      $array[$i]['pm']=$i+1;
    if($i<3)
    	{
    	$threeUser[]=$array[$i];
    	}
    }
    $this->threeUser=$threeUser;
    $this->meUser=$array[$flag];
    $this->display();
    }
    //投票
    public function to_tp()
    {
    	session_start();
        $btp=I("btp");
        $user=$_SESSION['UserInfo'];
        $tp=$user['openid'];
        if(!empty($btp)&&!empty($tp))
        {
        	
        $model=M("tp");
        $isTp=$model->where("tpid='{$tp}' and btpid='{$btp}'")->find();
        if(!empty($isTp))
        {
        $this->error("已经投过票了");
        }
        $data['tpid']=$tp;
        $data['btpid']=$btp;
        if($model->add($data))
        {
         $model2=M("user");
         $model2->where("openid='{$btp}'")->setInc("count",1);
         $this->success("ok");
        }
        else
        {
        $this->error("投票失败");
        }
        
        
        }
    }
}