<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	/**
	 * 判断是否已经登陆
	 *@author fangdong
	 */
	public function _initialize(){
		/*if (!isset($_SESSION['stu_id'])||!isset($_SESSION['username']))
			ajax_return('你还未登录',C('NoLogin'),'NoLogin');*/
	}
	
}
