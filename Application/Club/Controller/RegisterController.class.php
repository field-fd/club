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
            $registerInfo = I();
            foreach ($registerInfo as $key => $value) {
                switch ($key) {
                    case 'email':
                        if($registerInfo[$key]==''){
                            $this->error('请输入邮箱');
                        }
                        $condition['email'] = $registerInfo['email'];
                            if(M('Club')->where($condition)->find()){
                                $this->error('该邮箱已注册');
                            }
                         if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$registerInfo[$key])){  
                             $this->error('请输入正确的邮箱地址');
                        }
                        break;
                    case 'password':
                        if($registerInfo[$key]==''){
                            $this->error('请输入密码');
                        }
                        $passwd_length = strlen($registerInfo[$key]);
                        if($passwd_length<6||$passwd_length>16){  
                             $this->error('请输入6~16位之间的密码');
                        }
                        break;
                    case 'repassword':
                        if($registerInfo[$key]==''){
                            $this->error('请再次输入密码');
                        }
                        if($registerInfo['password']!=$registerInfo['repassword']){  
                             $this->error('两次输入密码不一样');
                        }
                        break;
                    case 'verify':
                        if(!check_verify($registerInfo[$key])){
                            $this->error('验证码错误');
                        }
                        break;
                    case 'leader':
                        if($registerInfo[$key]==''){
                            $this->error('请输入负责人姓名');
                        }
                        break;

                    case 'phone':
                        if($registerInfo[$key]==''){
                            $this->error('请输入手机号码');
                        }
                        break;

                    case 'qq':
                        if($registerInfo[$key]==''){
                            $this->error('请输入QQ号码');
                        }
                        break;
                    case 'name':
                        if($registerInfo[$key]==''){
                            $this->error('请输入社团名');
                          }
                        break;

                    case 'logo':
                        if($registerInfo[$key]==''){
                            $this->error('请选择社团logo');
                        }
                        break;

                    case 'type':
                        if($registerInfo[$key]==''){
                            $this->error('请选择社团类型');
                        }
                        break;

                    case 'relation':
                        if($registerInfo[$key]==''){
                            $this->error('请输入所属院系');
                        }                     
                        break;

                    case 'introduce':
                        if($registerInfo[$key]==''){
                            $this->error('请输入社团介绍');
                        }
                        if(strlen($registerInfo[$key])<180){
                            $this->error('社团介绍不少于60个字');
                        }
                        break;

                    case 'teacher':
                        if($registerInfo[$key]==''){
                            $this->error('请填写指导老师姓名');
                        }
                        break;

                    default:
                        break;
                }
            }
            //图片上传
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     1048576 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
            $info   =   $upload->uploadOne($_FILES['image']);  //上传图片
            if(!$info) {// 上传错误
                $this->error($upload->getError()); 
            }
            $data = array(
                'name' => $registerInfo['name'],
                'type' => $registerInfo['type'],
                'introduce' => $registerInfo['introduce'],
                'relation' => $registerInfo['relation'],
                'leader' => $registerInfo['leader'],
                'teacher' => $registerInfo['teacher'],
                'qq' => $registerInfo['qq'],
                'phone' => $registerInfo['phone'],
                'email' => $registerInfo['email'],
                'image' => $info['savepath'].$info['savename'],
                'password' => md5($registerInfo['password']),
            );
            $Club     = M('Club');
            $rSave = $Club->add($data);
            if($rSave){
                $this->success('资料提交成功，我们会在三个工作日内审核您的资料~');
            }else{
                $this->error('资料提交失败！');
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