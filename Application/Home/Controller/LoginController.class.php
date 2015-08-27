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
            $club = D('student');
            $club->checkLogin($LoginInfo);
        } 
    /**
     * 登陆信息处理
     * @author fangdong
    */   
   public function handle(){  
         header("Content-type: text/html; charset=utf-8");
         $loginInfo = I();   
         $rUser=D('student')->Login($loginInfo);
         if ($rUser){
             session('stu_id',$rUser['id']);
             session('username',$rUser['name']);
             ajax_return('登陆成功',C('LoginSuccess'),'LoginSuccess');
         }else{
            ajax_return('登录失败',C('Error'),'Error');
      }  
   }
  

}
