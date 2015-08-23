<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
  /**
   * @author fangdong 
   */
    public function index(){
      $where['status'] = 0;  //0待审核，1通过，2驳回，3删除到回收站
      $list = M('activity')->where($where)->order('id DESC')->select();
      $this->list = $list;
      $this->display();
    }
  /**
   * 待审核活动展示
   * @author fangdong 
   */
   public function showActivity(){
      $id = I('id');
      $data=M('activity')->where(array('id'=>$id))->find();
      $this->assign('activity',$data);
      $this->display();
   }
　/**
   * 通过　
   * @author fangdong 
   */
   public function pass(){
        $activity_id = I('activity_id');
        $data['status'] = 1;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
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
        $activity_id = I('activity_id');
        $data['status'] = 2;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
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
      $this->list = $list;
      $this->display();
    }

　/**
   * 删除到回收站　
   * @author fangdong 
   */
   public function delete(){
        $activity_id = I('activity_id');
        $data['status'] = 3;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
        if($alter){
            ajax_return('删除成功',C('Ok'),'Ok');
        }else{
            ajax_return('失败',C('Error'),'Error');
      }
   }

　/**
   * 回收站还原　
   * @author fangdong 
   */
   public function recover(){
        $activity_id = I('activity_id');
        $data['status'] = 0;
        $alter=M('activity')->where(array('id'=>$activity_id))->save($data);
        if($alter){
             ajax_return('还原成功',C('Ok'),'Ok');
        }else{
             ajax_return('失败',C('Error'),'Error');
      }
   }

　/**
   * 已通过活动展示　
   * @author fangdong 
   */
   public function passedActivity(){
        $where['status'] = 1;  //0待审核，1通过，2驳回，3删除到回收站
      $list = M('activity')->where($where)->order('id DESC')->select();
      $this->list = $list;
      $this->display();
   }

　/**
   * 已通过活动展示　
   * @author fangdong 
   */
   public function showPassedActivity(){
      $id = I('id');
      $data=M('activity')->where(array('id'=>$id))->find();
      $this->assign('activity',$data);
      $this->display();
   }
}

