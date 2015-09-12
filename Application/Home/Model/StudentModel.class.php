<?php
namespace Home\Model;
use Think\Model;
class StudentModel extends Model
{
    /**
     * 模型验证注册信息
     * @author Jfangdong
     * @param array $registerInfo  
     */
    function checkRegister($registerInfo){
        
            foreach ($registerInfo as $key => $value) {
                switch ($key) {
                    case 'name':
                        if($registerInfo[$key]==''){
                            ajax_return('请输入姓名',C('NameEmpty'),'NameEmpty');
                        }
                        break;
                    case 'email':
                        if($registerInfo[$key]==''){
                            ajax_return('请输入邮箱',C('EmailEmpty'),'EmailEmpty');
                        }
                         if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$registerInfo[$key])){  
                             ajax_return('请输入正确的邮箱地址',C('EmailError'),'EmailError');
                        }
                        $condition['email'] = $registerInfo['email'];
                        if(M('Student')->where($condition)->find()){
                             ajax_return('该邮箱已注册',C('HavaStudent'),'HavaStudent');
                         }
                        break;
                    case 'password':
                        if($registerInfo[$key]==''){
                            ajax_return('请输入密码',C('PasswdEmpty'),'PasswdEmpty');
                        }
                        $passwd_length = strlen($registerInfo[$key]);
                        if($passwd_length<6||$passwd_length>16){  
                             ajax_return('请输入6~16位之间的密码',C('PasswdError'),'PasswdError');
                        }
                        break;
                    case 'repassword':
                        if($registerInfo[$key]==''){
                            ajax_return('请再次输入密码',C('RePasswdEmpty'),'RePasswdEmpty');
                        }
                        if($registerInfo['password']!=$registerInfo['repassword']){  
                             ajax_return('两次输入密码不一样',C('RePasswdError'),'RePasswdError');
                        }
                        break;
                    case 'verify':
                        if(!check_verify($registerInfo[$key])){
                            ajax_return('验证码错误',C('VerifyError'),'VerifyError');
                        }
                        break;
                    default:
                        break;
                }
            }
    }
 
    /**
     * 存储学生的注册信息到数据库
     * @author fangdong
     * @param  array $registerInfo  注册信息
     * @return bool  
     */
    function SaveData($registerInfo){
        $this->checkRegister($registerInfo);
        $data = array(
             'name' =>  $registerInfo['name'],
             'email' => $registerInfo['email'],
             'password'=> md5($registerInfo['password']),
             'reg_time'=> time()  
            );
        $result = $this->add($data);
        return $result;
    }


     /**
     * 模型验证登陆信息
     * @author fangdong
     * @param array $loginInfo
     */
    function checkLogin($loginInfo){
        
            foreach ($loginInfo as $key => $value) {
                switch ($key) {
                    case 'email':
                        if($loginInfo[$key]==''){
                            ajax_return('请输入邮箱',C('EmailEmpty'),'EmailEmpty');
                        }
                        break;
                    case 'password':
                        if($loginInfo[$key]==''){
                            ajax_return('请输入密码',C('PasswdEmpty'),'PasswdEmpty');
                        }                   
                        break;
                    default:
                        break;
                }
            }
    }

   /**
     * 登陆验证
     * @author fangdong
     * @param  array $LoginData  登陆信息
     * @return string $ClubInfo   
     */
 function Login($LoginData){
        $this->checkLogin($LoginData);
        $where = array(
            'email' => $LoginData['email'],           
            );
        $StudentInfo = $this->where($where)->find();
        $password = md5($LoginData['password']);
        if($password != $StudentInfo['password']){            
            ajax_return('账号或密码错误',C('LoginError'),'LoginError');
        }else{
            return $StudentInfo;
        }

    }


}