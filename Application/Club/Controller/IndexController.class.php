<?php
namespace Club\Controller;
use Think\Controller;
class IndexController extends Controller {
   public function index(){
   	  $this->display();
   }
 /**
   * 首页获取社团信息
   * @author fangdong
   */
   public function getData(){
   	    $where['id'] = session('club_id');
      	$rData = M('club')->where($where)->find();
	      if($rData){
	    	    ajax_return($rData,C('Ok'),'Ok');
        }else{
            ajax_return('获取数据失败',C('Error'),'Error');
	    }
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

