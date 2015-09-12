<?php
function check_verify($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
}  

function ajax_return($data,$status,$msg){
	$r = array(
		'data'   =>$data,
		'status' =>$status,
		'msg'	 =>$msg
		);
	header('Content-Type:application/json;charset=utf-8');
	exit(json_encode($r));
}
