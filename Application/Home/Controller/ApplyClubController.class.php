<?php
namespace Home\Controller;
use Think\Controller;
class ApplyClubController extends CommonController {

     /**
      * 社团展示
      * @author fangdong
      */   
     public function index(){  
            $list = M('club')->select();
            if($list){
                ajax_return($list,C('Ok'),'Ok');
            }else{
                ajax_return('获取失败！',C('Error'),'Error');
            }
      }

     /**
      * 社团详细介绍
      * @author fangdong
      */
    public function showClub(){
             $id = I('id');
             $data=M('club')->where(array('id'=>$id))->find();
             if($data){
                 ajax_return($data,C('Ok'),'Ok');
             }else{
                 ajax_return('获取失败！',C('Error'),'Error');
              }
        } 

        /**
         * 申请加入填写简历,ajax返回社团id和部门
         * @author fangdong
         * @param $club_id  $department
         */
    public function join(){
             $club_id       = I('club_id');
             $department    = M('department')->where(array('club_id'=>$club_id))->find();
             $data = array(
                 'club_id'    => $club_id ,
                 'department' => $department
                );
            if($department){
                 ajax_return($data,C('Ok'),'Ok');
             }else{
                 ajax_return('获取失败！',C('Error'),'Error');
             }
        }

        /**
         * 申请加入社团数据处理
         * @author fangdong
         */
     public function applyJoin(){
                $postData   = I();
                $member = D('member');
                //数据验证
                $member ->checkInfo($postData);
               
                $r = $member->apply_data_insert($postData);//插入数据
                if($r){
                    ajax_return('资料已经提交啦，敬候佳音吧~',C('Ok'),'Ok');
                }else{
                    ajax_return('资料未能提交成功',C('Error'),'Error');
                }
    }
}
