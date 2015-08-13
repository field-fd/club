<?php
namespace Admin\Controller;
use Think\Controller;
class ClubController extends CommonController {
	
    public function index(){
    	$where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
    	$list = M('club')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }
   //待审核社团列表展示
   public function showClub(){
      $id = I('id');
      $data=M('club')->where(array('id'=>$id))->find();
      $this->assign('club',$data);
      $this->display();
   }
   //通过
   public function pass(){
        $club_id = I('club_id');
        $data['status'] = 1;
        $alter=M('club')->where(array('id'=>$club_id))->save($data);
	    if($alter){
	   	  $this->success("成功！",U('Club/index'));
	    }else{
	   	  $this->error('失败！');
	    }
   }
   //驳回
   public function reject(){
        $club_id = I('club_id');
        $data['status'] = 2;
        $alter=M('club')->where(array('id'=>$club_id))->save($data);
	    if($alter){
	   	  $this->success("驳回成功！",U('Club/index'));
	    }else{
	   	  $this->error('驳回失败！');
	    }
   }
   //回收站
   public function recycle(){
    	$where['status'] = 3; 
    	$list = M('club')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }

   //删除到回收站
   public function delete(){
   	    $club_id = I('club_id');
        $data['status'] = 3;
        $alter=M('club')->where(array('id'=>$club_id))->save($data);
	    if($alter){
	   	  $this->success("删除成功！",U('Club/index'));
	    }else{
	   	  $this->error('删除失败！');
	    }
   }
   //回收站还原
   public function recover(){
        $club_id = I('club_id');
        $data['status'] = 0;
        $alter=M('club')->where(array('id'=>$club_id))->save($data);
	    if($alter){
	   	  $this->success("还原成功！",U('Club/index'));
	    }else{
	   	  $this->error('还原失败！');
	    }
   }

   //已通过社团
   public function passedClub(){
   	    $where['status'] = 1;  //0待审核，1通过，2驳回，3删除到回收站
    	$list = M('club')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
   }
   public function showPassedClub(){
      $id = I('id');
      $data=M('club')->where(array('id'=>$id))->find();
      $this->assign('club',$data);
      $this->display();
   }
}

