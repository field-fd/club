<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    /**
     * 登陆页面信息检查
     * @author fangdong
      */
   public function LoginCheck(){
            $LoginInfo = I();
            $club = D('Club');
            $club->checkLogin($LoginInfo);
        } 
    /**
     * 登陆信息处理
     * @author fangdong
    */   
   public function handle(){  
         header("Content-type: text/html; charset=utf-8");
         $loginInfo = I();   
         $user=D('student')->Login($loginInfo);
         if ($user){
             session('stu_id',$user['id']);
             session('username',$user['name']);
             ajax_return('登陆成功',C('Ok'),'Ok');
         }else{
            ajax_return('登录失败',C('Error'),'Error');
      }  
   }
  

}
