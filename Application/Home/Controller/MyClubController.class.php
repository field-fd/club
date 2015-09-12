<?php
namespace Home\Controller;
use Think\Controller;
class MyClubController extends CommonController {
 /**
  * 我的社团
  * @author fangdong
  */
  public function index(){  
    	$studentID = I('stu_id');
    	if(!$studentID){
                  ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
             }
    	//$data = M('club')->query("SELECT * FROM club_club WHERE id in (SELECT club_id FROM club_member WHERE stu_id = {$studentID} AND status = 1)");  //嵌套查询
    	$clubInfo = M()->table(array('club_member'=>'a','club_club'=>'b'))->field('b.*')->where("a.club_id = b.id AND a.stu_id = {$studentID} AND a.status = 1")->select();  //联表查询
    	if($clubInfo){
            ajax_return($clubInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
   }
 /**
  * 社团成员
  * @author fangdong
  */
 public function member(){
       $clubID = I('id');
       if(!$clubID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
       $where = array(
       	   'club_id' => $clubID,
       	   'status'  => 1
       	  );
       $memberInfo = M('member')->where($where)->select();
       if($memberInfo){
            ajax_return($memberInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
   }
   

}

