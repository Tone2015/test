<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends AdminCommonAction {
    public function index(){
    	$model=M("user");
    	$data=$model->where("isUpload=1")->select();
    	import("@.Util.Page");
    	$count= $data=$model->where("isUpload=1")->count();
		$Page= new Page($count,10);
		$Page->setConfig('theme', '<li><a>%totalRow% %header%</a></li> %upPage% %first%  %prePage%  %linkPage%  %downPage% %end% ');
		$show= $Page->show();
		$list =$data=$model->where("isUpload=1")->order("count desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('show',$show);
		$this->assign('Page',$Page);
	    $this->display();
    }
    public function delete()
    {
    $model=M("user");
    $id=I("id");
    if(empty($id))
    $this->error("参数错误");
    else {
    if($model->delete($id))
    {
    $this->success("删除成功");
    }
    else {
    $this->error("删除失败");
    }
    }
    }
}