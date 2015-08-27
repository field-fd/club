<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model
{    
     /**
     * 模型验证登陆信息
     * @author fangdong
     * @param array $loginInfo
     */
    function checkLogin($loginInfo){
        
            foreach ($loginInfo as $key => $value) {
                switch ($key) {
                    case 'username':
                        if($loginInfo[$key]==''){
                            ajax_return('请输入用户名',C('UserEmpty'),'UserEmpty');
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
            'username' => $LoginData['username'],           
            );
        $AdminInfo = $this->where($where)->find();
        $password = md5($LoginData['password']);
        if($password != $AdminInfo['password']){            
            ajax_return('账号或密码错误',C('LoginError'),'LoginError');
        }else{
            return $AdminInfo;
        }

    }


}