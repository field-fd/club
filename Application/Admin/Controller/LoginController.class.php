<?php
namespace Admin\Controller;
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
            $club = D('admin');
            $club->checkLogin($LoginInfo);
        } 
  /**
    * 登陆信息处理
    * @author fangdong
    */   
   public function handle(){  
         header("Content-type: text/html; charset=utf-8");
         $loginInfo = I();   
         $rUser=D('admin')->Login($loginInfo);
         if ($rUser){
             ajax_return('登陆成功',C('Ok'),'Ok');
         }else{
            ajax_return('登录失败',C('Error'),'Error');
      }  
   }

}