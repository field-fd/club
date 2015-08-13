<?php
namespace Club\Controller;
use Think\Controller;
class CommonController extends Controller{
	/**
	 * 判断是否已经登陆
	 *@author fangdong
	 */
	public function _initialize(){
		if (!isset($_SESSION['club_id'])||!isset($_SESSION['club_name']))
			ajax_return('你还未登录',C('NoLogin'),'NoLogin');
	}
	
}
?>