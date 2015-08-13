<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		if (!isset($_SESSION['username']))
			ajax_return('你还未登录',C('NoLogin'),'NoLogin');
	}
	
}
?>