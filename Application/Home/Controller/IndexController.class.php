<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
 /**
  * 社团活动
  * @author fangdong
  */
  public function index(){  
    	$ActivityInfo = M('Activity')->where(array('status'=>1))->select();
    	if($ActivityInfo){
            ajax_return($ActivityInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
   }

/**
  * 搜索社团
  * @author fangdong
  */
   public function search(){
       $name = I('name');  //查询条件
       if(!$name){
           ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
       $club = M('club'); 
       $where['name'] = array('like',"{$name}%");
       $ClubInfo = $club->where($where)->select();
       if($ClubInfo){
            ajax_return($ClubInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
   }
   /**
   * 根据具体社团返回社团活动
   * @author fangdong
   */ 
   public function clubActivity(){  
       $clubID = I('id');  //社团id
       if(!$clubID){
           ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
          }  
        $where = array(
             'status'=>1,
             'club_id'    =>$clubID
             );
       $ActivityInfo = M('Activity')->where($where)->select();
       if($ActivityInfo){
            ajax_return($ActivityInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
   }
}

