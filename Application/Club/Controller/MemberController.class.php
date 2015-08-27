<?php
namespace Club\Controller;
use Think\Controller;
class MemberController extends CommonController{
  /**
    * 待审核成员
    * @author fangdong
    */
	public function index(){
    	$where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
    	$where['club_id'] = session('club_id');
    	$list = M('member')->where($where)->order('id DESC')->select();
	    if($list){
           ajax_return($list,C('Ok'),'Ok');
      }else{
           ajax_return('未查询到数据',C('NoData'),'NoData');
      }
    }
   /**
    * 成员的详细资料展示
    * @author fangdong
    */
   public function showMember(){
      $memberID = I('id');
      if(!$memberID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
      $memberInfo=M('member')->where(array('id'=>$memberID))->find();
      if($memberInfo){
           ajax_return($memberInfo,C('Ok'),'Ok');
      }else{
           ajax_return('未查询到数据',C('NoData'),'NoData');
      }
   }
   /**
    * 通过成员申请请求
    * @author fangdong
    */
   public function pass(){
        $memberID = I('id');
        if(!$memberID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $status = 1;  //通过
        $alter=D('member')->AlterStatus($memberID,$status);
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
        $memberID = I('id');
        if(!$memberID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $status = 2;   //驳回
        $aAlter=D('member')->AlterStatus($memberID,$status);
        if($rAlter){
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
    	$where['status'] = 3 ;
    	$where['club_id'] = session('club_id');
    	$list = M('member')->where($where)->order('id DESC')->select();
	    if($list){
           ajax_return($list,C('Ok'),'Ok');
      }else{
           ajax_return('未查询到数据',C('NoData'),'NoData');
      }
    }

   /**
    * 成员申请请求删除至回收站
    * @author fangdong
    */
   public function delete(){
   	    $memberID = I('id');
        if(!$memberID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $status = 3;  //删除
        $alter=D('member')->AlterStatus($memberID,$status);
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
        $memberID = I('id');
        if(!$memberID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $status = 0;    //待审核
        $alter=D('member')->AlterStatus($memberID,$status);
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
   	    $where['club_id'] = session('club_id');
    	$list = M('member')->where($where)->select();
	    if($list){
           ajax_return($list,C('Ok'),'Ok');
      }else{
           ajax_return('未查询到数据',C('NoData'),'NoData');
      }
   }
}