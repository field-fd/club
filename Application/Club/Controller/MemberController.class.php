<?php
namespace Club\Controller;
use Think\Controller;
class MemberController extends CommonController{
	public function index(){
    	$where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
    	$list = M('member')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }
   /**
    * 待审核成员列表展示
    * @author fangdong
    */
   public function showMember(){
      $id = I('id');
      $data=M('member')->where(array('id'=>$id))->find();
      $this->assign('member',$data);
      $this->display();
   }
   /**
    * 通过成员申请请求
    * @author fangdong
    */
   public function pass(){
        $member_id = I('member_id');
        $status = 1;  //通过
        $alter=D('member')->AlterStatus($member_id,$status);
	      if($alter){
	   	      ajax_return('通过成功',C('Ok'),'Ok');
        }else{
            ajax_return('通过失败',C('Error'),'Error');
	    }
   }
    /**
    * 驳回成员申请请求
    * @author fangdong
    */
   public function reject(){
        $member_id = I('member_id');
        $status = 2;   //驳回
        $alter=D('member')->AlterStatus($member_id,$status);
        if($alter){
            ajax_return('驳回成功',C('Ok'),'Ok');
        }else{
            ajax_return('驳回失败',C('Error'),'Error');
      }
   }
   /**
    * 回收站
    * @author fangdong
    */
   public function recycle(){
    	$where['status'] = 3
    	$list = M('member')->where($where)->order('id DESC')->select();
	    $this->list = $list;
	    $this->display();
    }

   /**
    * 成员申请请求删除至回收站
    * @author fangdong
    */
   public function delete(){
   	    $member_id = I('member_id');
        $status = 3;  //删除
        $alter=D('member')->AlterStatus($member_id,$status);
        if($alter){
            ajax_return('删除成功',C('Ok'),'Ok');
        }else{
            ajax_return('删除失败',C('Error'),'Error');
      }
   }
   /**
    * 回收站还原
    * @author fangdong
    */
   public function recover(){
        $member_id = I('member_id');
        $status = 0;    //待审核
        $alter=D('member')->AlterStatus($member_id,$status);
        if($alter){
            ajax_return('还原成功',C('Ok'),'Ok');
        }else{
            ajax_return('还原失败',C('Error'),'Error');
      }
   }

   /**
    * 已通过成员列表展示
    * @author fangdong
    */
   public function passedMember(){
   	  $where['status'] = 1;  //通过
    	$list = M('member')->where($where)->select();
	    $this->list = $list;
      $club_id = session('club_id');
      $department = M('department')->where(array('id'=>$club_id))->select();
      $this->department = $department;
	    $this->display();
   }
   /**
    * 已通过成员个人信息展示
    * @author fangdong
    */
   public function showPassedMember(){
      $id = I('id');
      $member=M('member')->where(array('id'=>$id))->find();
      $this->assign('member',$member);
      $this->display();
   }
}