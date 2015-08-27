<?php
namespace Club\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
      $this->display();
    }
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
	       $clubInfo=D('club')->Login($loginInfo);
         if ($clubInfo){
             session('club_id',$clubInfo['id']);
             session('club_name',$clubInfo['name']);
		         ajax_return('登陆成功',C('LoginSuccess'),'LoginSuccess');
         }else{
		        ajax_return('登录失败',C('Error'),'Error');
      }  
   }

}