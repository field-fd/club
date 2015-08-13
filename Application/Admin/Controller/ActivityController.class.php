<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
	
    public function index(){
    	$where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
    	$list = M('activity')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }
   //待审核活动列表展示
   public function showActivity(){
      $id = I('id');
      $data=M('activity')->where(array('id'=>$id))->find();
      $this->assign('activity',$data);
      $this->display();
   }
   //通过
   public function pass(){
        $activity_id = I('activity_id');
        $data['status'] = 1;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
	    if($alter){
	   	  $this->success("成功！",U('activity/index'));
	    }else{
	   	  $this->error('失败！');
	    }
   }
   //驳回
   public function reject(){
        $activity_id = I('activity_id');
        $data['status'] = 2;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
	    if($alter){
	   	  $this->success("驳回成功！",U('activity/index'));
	    }else{
	   	  $this->error('驳回失败！');
	    }
   }
   //回收站
   public function recycle(){
    	$where['status'] = 3; 
    	$list = M('activity')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }

   //删除到回收站
   public function delete(){
   	    $activity_id = I('activity_id');
        $data['status'] = 3;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
	    if($alter){
	   	  $this->success("删除成功！",U('activity/index'));
	    }else{
	   	  $this->error('删除失败！');
	    }
   }
   //回收站还原
   public function recover(){
        $activity_id = I('activity_id');
        $data['status'] = 0;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
	    if($alter){
	   	  $this->success("还原成功！",U('activity/index'));
	    }else{
	   	  $this->error('还原失败！');
	    }
   }

   //已通过的活动
   public function passedActivity(){
   	    $where['status'] = 1;  //0待审核，1通过，2驳回，3删除到回收站
    	$list = M('activity')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
   }
   public function showPassedActivity(){
      $id = I('id');
      $data=M('activity')->where(array('id'=>$id))->find();
      $this->assign('activity',$data);
      $this->display();
   }
}

