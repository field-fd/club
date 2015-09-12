<?php if (!defined('THINK_PATH')) exit();?>
  <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/club/Public/css/mystyle.css">
<script src="/club/Public/js/jquery-1.6.2.min.js"></script>
<title>成员管理</title>
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
        <li>
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
        <li  style="background:#4695d0">
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
          <div class="back-btm">
             <div class="triangle-left"></div>
             <a href="javascript:history.go(-1);">返回</a>
             <div class="member-info">成员信息</div>
          </div>
          <ul class="content-wp">
              <li>姓名：<?php echo ($member["name"]); ?></li>  
              <li>性别：<?php echo ($member["sex"]); ?></li>
              <li>学院：<?php echo ($member["college"]); ?></li>
              <li>班级：<?php echo ($member["class"]); ?></li>
              <li>手机号：<?php echo ($member["telephone"]); ?></li>
              <li>email：<?php echo ($member["email"]); ?></li>
              <li>申请加入部门：<?php echo ($member["department_name"]); ?></li>
              <li>爱好：<?php echo ($member["hobby"]); ?></li>
              <li>加入理由：<?php echo ($member["reason"]); ?></li>           
          </ul>
          <div class="content-bottom">
                <span onclick="memberPass(<?php echo ($member["id"]); ?>)">通过</span>
                <span onclick="memberReject(<?php echo ($member["id"]); ?>)">驳回</span>
                <span onclick="memberDelete(<?php echo ($member["id"]); ?>)">删除</span>
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