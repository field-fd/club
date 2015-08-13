<?php
namespace Club\Controller;
use Think\Controller;
class RegisterController extends Controller {

        public function index(){
            $this->display();
        }
        /**
         * 注册页面信息检查（第一部分）
         * @author Jason
         */
        public function registerCheck(){
            $registerInfo = I();
            $club         = D('Club');
            $club->checkRegister($registerInfo);
        }
        /**
         * 负责人信息采集验证（第二部分）
         * @author Jason 
         */
        public function leaderCheck(){
            $leaderInfo = I();
            D('Club')->checkLeader($leaderInfo);
        }
        /**
         * 社团信息验证（第三部分）
         * @author Jason
         */
        public function clubCheck(){
            $clubInfo = I();
            D('Club')->checkInfo($clubInfo);
        }
        /**
         * 注册信息保存
         * @author Jason
         */
        public function handle(){
            $clubData = I();
            $Club     = D('Club');
            $rSave    = $Club->SaveData($clubData);
            if($rSave){
                ajax_return('资料提交成功，我们会在三个工作日内审核您的资料~',C('Ok'),'Ok');
            }else{
                ajax_return('资料提交失败！',C('Error'),'Error');
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