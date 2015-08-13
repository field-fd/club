<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
      $this->display();
    }
    

   public function handle(){  
    header("Content-type: text/html; charset=utf-8");
    $username=I('username');   //用户名
    $password=md5(I('password'));  //密码
    $where = array(
          'username' => $username,
          'password' => $password
      );
    if($username==""||$password==""){
          $this->error('用户名或密码不能为空');
    }else{
	       $user=M('admin')->where($where)->find();
         if (empty($user)){
		      $this->error('用户名或密码错误');
          }else{
		    $this->success('登陆成功',U('Index/index'));
	      session('username',$user['username']);
       }
     }  
   }

}