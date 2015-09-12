<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
    public function index(){
    	$this->display();
    }

  /**
   * 退出登录
   * @author fangdong
   */
  public function loginOut(){
  	    session(null);
		    $this->redirect('Login/index');
  }
}

