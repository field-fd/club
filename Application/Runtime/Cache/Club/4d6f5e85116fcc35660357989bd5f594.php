<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>部门</title>
<link rel="stylesheet" type="text/css" href="/club/Public/css/admin.css" />
<script src="/club/Public/js/jquery-1.6.2.min.js"></script>
<script>
         function myClick(url) {
             if (confirm("你确定要删除吗？")) {
			  location.href=url;
             }
             else {
                 return false;
             }
         }
		     function alter(id,name){
         $("body").css("opacity","0.5");
         $("#alterDiv").css("display","block");
         $("#alterName").val(name);
         $("#alterId").val(id);
         }
         function check_all(obj,cName) 
{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++)
    {
    checkboxs[i].checked = obj.checked;
    } 
}   
   function add(){
     $("#block").fadeToggle();
   }

		</script><!--JS换肤特效  FD(change)-->
		<style>
body {
	background-image:url(/club/Public/images/gb5.jpg);
}
.head {
	background-image:url(/club/Public/images/topbar.png);
}
.module-body img {
	height: 120px;
	margin-left: 4px;
}
.content-body{
 height:480px;
}
<!--对教师照片定义大小 2014-12-08改-->
</style>
</head>
<body style="width:100%;height:100%;background:rgb(213, 213, 213);opacity:1">   
    <div style="position:absolute;width:400px;height:300px;left:500px;top:100px;background:yellow;z-index:500;display:none" id="alterDiv">
       <form action="/club/index.php/Club/Department/alterDepartment" method="GET" id="alterForm">
          <input type=text name="departmentName" id="alterName" value="" >
          <input type="hidden" name="departmentId" id="alterId" value="">
          <input type=submit value="确定">
      </form>
    </div>
      <form action="/club/index.php/Club/Department/deleteDepartment" method="get">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="reply">
          <input type="checkbox" name="checkbox[]" value="<?php echo ($vo["id"]); ?>" />
		        <span class="min-left"><?php echo ($vo["name"]); ?> </span>
		        &nbsp&nbsp&nbsp&nbsp<a   href="javascript:myClick('/club/index.php/Club/Department/deleteDepartment/checkbox/<?php echo ($vo["id"]); ?>')">&nbsp&nbsp删除</a> <a href="javascript:alter('<?php echo ($vo["id"]); ?>','<?php echo ($vo["name"]); ?>')">修改</a>
		       </span>
		     </div><?php endforeach; endif; else: echo "" ;endif; ?>
       <p><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" />全选/全不选</p>
       <br>
       <input type="submit" name="Submit" value="删除" />
        </form>

        <div style="width:80px;background:#ccc;cursor:pointer;" onclick="add()">增加部门</div>
       <div id="block" style="display:none;">
       <form action="/club/index.php/Club/Department/addDepartment" method="post">
        <input type=text name="department">
         <input type=submit value="确定">
         </form>
         </div>

</body>
</html>