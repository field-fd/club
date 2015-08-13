<?php
//+---------------------------------------------------
//|	系统公共函数库
//+---------------------------------------------------
//|	@author Jason
//+---------------------------------------------------

/**
 * Ajax接口返回
 *
 * @author Jason
 * @param mixed $data
 * @param int   $status
 * @param String $msg
 */
function ajax_return($data,$status,$msg){
	$r = array(
		'data'   =>$data,
		'status' =>$status,
		'msg'	 =>$msg
		);
	header('Content-Type:application/json;charset=utf-8');
	exit(json_encode($r));
}

