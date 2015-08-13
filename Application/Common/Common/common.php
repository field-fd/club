<?php
/**
 * 过滤HTML标签
 *
 * @param  String $str 过滤目标字符串
 * @return String $str 已过滤字符串
 * @author 方东
 */
function str_to($str){
	$str=str_replace(" ", "&nbsp;", $str);
	$str=str_replace("<", "&lt;", $str);
	$str=str_replace(">", "&gt;", $str);
	$str=nl2br($str);
	return $str;
}

