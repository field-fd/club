<?php
namespace Club\Model;
use Think\Model;
class ClubModel extends Model
{
    /**
     * 模型验证注册页面
     * @author Jason
     * @param array $registerInfo
     */
    function checkRegister($registerInfo){
        
            foreach ($registerInfo as $key => $value) {
                switch ($key) {
                    case 'email':
                        if($registerInfo[$key]==''){
                            ajax_return('请输入邮箱',C('EmailError'),'EmailError');
                        }
                         if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$clubInfo[$key])){  
                             ajax_return('请输入正确的邮箱地址',C('EmailError'),'EmailError');
                        }
                        break;
                    case 'password':
                        if($registerInfo[$key]==''){
                            ajax_return('请输入密码',C('PasswdError'),'PasswdError');
                        }
                        $passwd_length = strlen($registerInfo[$key]);
                        if($passwd_length<6||$passwd_length>16){  
                             ajax_return('请输入6~16位之间的密码',C('PasswdError'),'PasswdError');
                        }
                        break;
                    case 'repassword':
                        if($registerInfo[$key]==''){
                            ajax_return('请再次输入密码',C('RePasswdError'),'RePasswdError');
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
     * 负责人信息验证
     * @author Jason
     * @param  array $leaderInfo
     */
    function checkLeader($leaderInfo){
        foreach ($leaderInfo as $key => $value) {
                switch ($key) {
                    case 'leader':
                        if($leaderInfo[$key]==''){
                            ajax_return('请输入负责人姓名',C('LeaderError'),'LeaderError');
                        }
                        break;

                    case 'phone':
                        if($leaderInfo[$key]==''){
                            ajax_return('请输入手机号码',C('PhoneError'),'PhoneError');
                        }
                        break;

                    case 'qq':
                        if($leaderInfo[$key]==''){
                            ajax_return('请输入QQ号码',C('QQError'),'QQError');
                        }
                        break;

                    default:
                        break;
                }
            }
    }
    /**
     * 验证注册社团信息
     * @author Jason
     * @param array $clubInfo  社团注册信息
     */
    function checkInfo($clubInfo)
    {
        foreach ($clubInfo as $key => $value) {
                switch ($key) {
                    case 'name':
                        if($clubInfo[$key]==''){
                            ajax_return('请输入社团名',C('NoClub'),'NoClub');
                          }
                            $condition['name'] = $clubInfo['name'];
                            if(M('Club')->where($condition)->find()){
                                ajax_return('该社团已注册',C('HavaClub'),'HavaClub');
                            }
                        break;

                    case 'logo':
                        if($clubInfo[$key]==''){
                            ajax_return('请选择社团logo',C('NoLogo'),'NoLogo');
                        }
                        break;

                    case 'type':
                        if($clubInfo[$key]==''){
                            ajax_return('选择社团类型',C('TypeError'),'TypeError');
                        }
                        if((int)$clubInfo[$key]==1){
                            ajax_return('请选择所属院系',C('TypeError'),'TypeError');
                        }
                        break;

                    case 'introduce':
                        if($clubInfo[$key]==''){
                            ajax_return('请输入社团介绍',C('IntroError'),'IntroError');
                        }
                        if(strlen($clubInfo[$key])<180){
                            ajax_return('社团介绍不少于60个字',C('IntroError'),'IntroError');
                        }
                        break;

                    case 'teacher':
                        if($clubInfo[$key]==''){
                            ajax_return('请填写指导老师姓名',C('TeacherError'),'TeacherError');
                        }
                        break;
                        
                    default:
                        break;
                }
            }
    }
    /**
     * 存储社团的注册信息到数据库
     * @author Jason
     * @param  array $ClubData  注册信息
     * @return bool  
     */
    function SaveData($ClubData){
        $this->checkRegister($ClubData);
        $this->checkLeader($ClubData);
        $this->checkInfo($ClubData);
        $data = array(
            'name' => $ClubData['name'],
            'type' => $ClubData['type'],
            'introduce' => $ClubData['introduce'],
            'relation' => $ClubData['introduce'],
            'teacher' => $ClubData['leader'],
            'qq' => $ClubData['qq'],
            'phone' => $ClubData['phone'],
            'email' => $ClubData['email'],
            'image' => $ClubData['image'],
            'password' => md5($ClubData['password']),
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
                    case 'name':
                        if($loginInfo[$key]==''){
                            ajax_return('请输入社团名',C('NoClub'),'NoClub');
                        }
                        break;
                    case 'password':
                        if($loginInfo[$key]==''){
                            ajax_return('请输入密码',C('PasswdError'),'PasswdError');
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
            'name' => $LoginData['name'],           
            );
        $ClubInfo = $this->where($where)->find();
        $password = md5($LoginData['password']);
        if($password != $ClubInfo['password']){            
            session('club_id',$ClubInfo['id']);
            session('club_name',$ClubInfo['name']);
            ajax_return('账号或密码错误',C('LoginError'),'LoginError');
        }else{
            return $ClubInfo;
        }

    }


}