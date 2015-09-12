<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
   /**
     * 登陆页面展示
     * @author fangdong
     */
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
             session('username',$rUser['username']);
             ajax_return('登陆成功',C('LoginSuccess'),'LoginSuccess');
         }else{
             ajax_return('登录失败',C('Error'),'Error');
      }  
   }
/**
 * 生成验证码
 *@author fangdong
 */
     public function verify(){
                $Verify = new \Think\Verify();
                $Verify->codeSet ='0123456789';
                $Verify->fontSize = 14;
                $Verify->length   = 4;
                $Verify->useNoise = false;
                $Verify->entry();

    }

}