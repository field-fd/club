<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
  /**
   * 待审核活动
   * @author fangdong 
   */
    public function index(){
      $where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
      $list = M('activity')->where($where)->order('id DESC')->select();
      $this->list=$list;
      $this->display();
    }
  /**
   * 活动详细信息展示
   * @author fangdong 
   */
   public function showActivity(){
      $activityID = I('id');
      if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
      $activityInfo=M('activity')->where(array('id'=>$activityID))->find();
      $this->activity=$activityInfo;
      $this->display();
   }
/**
   * 通过　
   * @author fangdong 
   */
   public function pass(){
        $activityID = I('id');
        if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $data['status'] = 1;
        $alter=M('activity')->where(array('id'=>$activityID))->save($data);
        if($alter){
            ajax_return('成功',C('Ok'),'Ok');
        }else{
            ajax_return('失败',C('Error'),'Error');
       }
   }
/**
   * 驳回　
   * @author fangdong 
   */
   public function reject(){
        $activityID = I('id');
        if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $data['status'] = 2;
        $alter=M('activity')->where(array('id'=>$activityID))->save($data);
        if($alter){
            ajax_return('驳回成功',C('Ok'),'Ok');
        }else{
            ajax_return('失败',C('Error'),'Error');
      }
   }
/**
   * 回收站
   * @author fangdong 
   */
   public function recycle(){
      $where['status'] = 3; 
      $list = M('activity')->where($where)->order('id DESC')->select();
      $this->list=$list;
      $this->display();
    }

/**
   * 删除到回收站　
   * @author fangdong 
   */
   public function delete(){
        $activityID = I('id');
        if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $data['status'] = 3;
        $alter=M('activity')->where(array('id'=>$activityID))->save($data);
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
        $activityID = I('id');
        if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $data['status'] = 0;
        $alter=M('activity')->where(array('id'=>$activityID))->save($data);
        if($alter){
             ajax_return('还原成功',C('Ok'),'Ok');
        }else{
             ajax_return('还原失败',C('Error'),'Error');
      }
   }

/**
   * 已通过活动　
   * @author fangdong 
   */
   public function passedActivity(){
        $where['status'] = 1;  //0待审核，1通过，2驳回，3删除到回收站
        $list = M('activity')->where($where)->order('id DESC')->select();
        $this->list=$list;
        $this->display();
   }


 /**
    * 已通过活动的详细资料展示
    * @author fangdong
    */
   public function showPassedActivity(){
      $activityID = I('id');
      if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
      $activityInfo=M('activity')->where(array('id'=>$activityID))->find();
      $this->activity=$activityInfo;
      $this->display();
   }
    /**
    * 已删除社团的详细资料展示
    * @author fangdong
    */
   public function showDeleteActivity(){
      $activityID = I('id');
      if(!$activityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
      $activityInfo=M('activity')->where(array('id'=>$activityID))->find();
      $this->activity=$activityInfo;
      $this->display();
   }
}

