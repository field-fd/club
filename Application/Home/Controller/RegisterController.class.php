<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
  /**
   * 注册页面信息检查
   * @author fangdong
   */
 public function registerCheck(){
        $registerInfo = I();
        $student      = D('Student');
        $student->checkRegister($registerInfo);
        }
 
  /**
  * 注册信息保存
  * @author fangdong
  */
    public function handle(){
         $registerInfo = I();                    
         $Student     = D('Student');
        $rSave    = $Student->SaveData($registerInfo);
        if($rSave){
            ajax_return('注册成功',C('Ok'),'Ok');
        }else{
            ajax_return('注册失败！',C('Error'),'Error');
        }
    }

/**
 * 生成验证码
 * @author fangdong
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