<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCYYPE html>
<html>
    <head>
        <title>
        </title>
         <meta charset="utf-8">
    </head>
    <style>
	*{
		padding:0px;
		margin:0px;
		}
   body{background-color:rgb(226, 237, 245);
      font-family:Microsoft YaHei;
   }
    a {text-decoration:none;color:black;}
	a.add:link{
		height:34px;
		width:100px;
		background:rgb(67, 117, 182);
		margin:30px 0px 40px 200px;
		display:block;
		line-height:40px;
		text-align:center;
		}
    a.add:hover{
		background:blue;
		}	
	ol {
	  margin-left:50px;
	
	}	
	</style>
<body>
     <a  class="add" href="/think/index.php/Home/Login/addarticle">添加文章</a>
	 <ol>
	 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
       <?php echo ($vo["title"]); ?></li><br /><?php endforeach; endif; else: echo "" ;endif; ?>
</ol>
</body>
</html>