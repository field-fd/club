<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/club/Public/css/mystyle.css">
<script src="/club/Public/js/jquery-1.6.2.min.js"></script>
<title>部门管理</title>
</head>
<body>
<div class="group_left">
    <div class="head_logo">
        <div class="head_logoimg">
            <img src="/club/Public/Uploads/<?php echo (session('club_image')); ?>">
        </div>
    </div>
    <div class="head_ziti">
        <h2><?php echo (session('club_name')); ?>|</h2>
        <h3>社团百科</h3>
    </div>
    <ul>
        <li>
            <img src="/club/Public/images/computer.jpg">
            <a href="<?php echo U('Index/index');?>">平台首页</a>
        </li>
        <li style="background:#4695d0">
            <img src="/club/Public/images/add.jpg">
            <a href="<?php echo U('Department/index');?>">部门管理</a>
        </li>
        <li>
            <img src="/club/Public/images/voice.jpg">
            <a href="<?php echo U('Activity/index');?>">活动发布</a>
        </li>
        <li>
            <img src="/club/Public/images/thing.jpg">
            <a href="<?php echo U('Suggention/index');?>">接收反馈</a>
        </li>
        <li>
            <img src="/club/Public/images/people.jpg">
            <a href="javascript:alert('功能未开通');">群发消息</a>
        </li>
        <li>
            <img src="/club/Public/images/search.jpg">
            <a href="<?php echo U('Member/index');?>">审核申请</a>
        </li>
    </ul>
</div>
<div class="group_right">
    <div class="head_right">
        <div class="right_kinds">
            <a href="#"><?php echo (session('club_name')); ?></a>
            <p>您好，欢迎访问社团百科</p>
        </div>
        <div class="head_rig">
            <div class="abox"  onmouseover="demOver()" onmouseout="demOut()">
                <a href="#"><?php echo (session('club_name')); ?></a>
                <ul id="code">
                    <li>
                        <a href="#">更换头像</a>
                    </li>
                    <li>
                        <a href="#">修改密码</a>
                    </li>
                </ul>
            </div>
            <div class="abox_out">
                <a href="<?php echo U('Index/loginOut');?>">退出</a>
            </div>
        </div>
    </div>
    <div class="content">
          <ul class="content-list">
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                  <span> <input type="checkbox" name="checkbox[]" value="<?php echo ($vo["id"]); ?>" class="check" /><?php echo ($vo["name"]); ?>
                  </span>
                  <span >时间：<?php echo (date("Y-m-d",$vo["create_time"])); ?></span>
                  <span style="margin-right:10px;width:100px"><a href="javascript:void(0);" onclick="alterDepart('<?php echo ($vo["id"]); ?>','<?php echo ($vo["name"]); ?>','<?php echo ($vo["introduce"]); ?>')">修改</a></span>
                  <span ><a href="javascript:void(0);" onclick="deleteDepart(<?php echo ($vo["id"]); ?>)">删除</a></span>                
              </li><?php endforeach; endif; else: echo "" ;endif; ?>         
          </ul>
          <div class="content-bottom">
                <div class="checkAll"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" class="checkInput"/>全选/全不选</div>
                <span onclick="DepartDelete()">删除</span>
                <span class="showbtn1">添加部门</span>

                <div id="bg1"></div>
                <div class="box1" style="display:none">
                <h2>添加部门<a href="#" class="close1">关闭</a></h2>
                <div class="list1">
                    <p>请输入部门名:</p>
                    <input type="text"  class="addDepartInput1">
                    <p>请输入部门简介:</p>
                    <textarea class="departIntroduce1"></textarea>
                    <div class="submit-add">确定</div>
                </div> 
                </div>

                <div id="bg2"></div>
                <div class="box2" style="display:none">
                <h2>修改部门<a href="#" class="close2">关闭</a></h2>
                <div class="list2">
                    <p>请输入部门名:</p>
                    <input type="text"  class="addDepartInput2">
                    <p>请输入部门简介:</p>
                    <textarea class="departIntroduce2"></textarea>
                    <div class="submit-alter">确定</div>
                </div>
                </div>
          </div>
    </div>
    <div class="bottom_cen">
        <a>友情链接：</a>
        <a href="http://www.ldu.edu.cn">鲁东大学</a>
        <a href="http://www.ldustu.com">鲁大学生网</a>
        <a href="http://sailboat.ldustu.com">团队博客</a>
        <a href="http://xunji.ldustu.com">寻迹-鲁东大学失物招领</a>
        <a href="http://www.ldustu.com/a/tongzhi/2014/0619/4590.html">鲁东大学新生群</a>
        <a href="http://stbk.ldustu.com">社团百科</a>
        <a href="http://tieba.baidu.com/f?kw=%C2%B3%B6%AB%B4%F3%D1%A7">鲁东大学百度贴吧</a>
    </div>
    <div class="bottom_last">
        <p>2013 LDSN.鲁大学生网. All rights reservel 鲁ICP备13008791 站长统计</p>
    </div>
</div>
<script type="text/javascript" src="/club/Public/js/myjs.js"></script>
</body>
</html>