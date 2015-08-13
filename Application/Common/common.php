public function str_to($str){
$str=str_replace(" ", "&nbsp;", $str);
$str=str_replace("<", "&lt;", $str);
$str=str_replace(">", "&gt;", $str);
$str=nl2br($str);
return $str;

} 