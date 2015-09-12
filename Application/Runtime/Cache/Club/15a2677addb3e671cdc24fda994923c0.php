<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/club/Public/css/mystyle.css">
<script src="/club/Public/js/jquery-1.6.2.min.js"></script>
<title>社团注册</title>
</head>
<body>
<div class="ldu_head">
    <div class="ldu_img">
        <img src="/club/Public/images/ldulogo.jpg">
    </div>
</div>
<div class="ldu_content">
    <div class="content_top">
         <span>社团注册</span>
    </div>
    <div class="content_left">
        <form action="<?php echo U('Register/handle');?>" method="post" enctype="multipart/form-data" onsubmit="return checkRegister()">
            <label>邮箱：</label>
            <input class="content_input" type="text" name="email"/>
            <span class="tip">作为登录账号</span>

            <label>密码：</label>
            <input class="content_input" type="password" name="password"/>

            <label>确认密码：</label>
            <input class="content_input" type="password" name="repassword"/>

            <label>社团名称：</label>
            <input class="content_input" type="text" name="name" >

                <label>社团logo：</label>
                <div class="upImgBox">
                    <div id="preview">
                        <img  src="/club/Public/images/lddxlogo.jpg" class="content_radius">
                    </div>
                    <input type="file" name="image" onchange="previewImage(this)"/>
                </div>

            <label>社团简介：</label>
            <textarea class="content_introduce" type="text" name="introduce" ></textarea>

            <label>社团类型：</label>
             <select name="type" class="content_select">
                                <option selected="" value="院级社团">院级社团</option>
                                <option value="校级社团">校级社团</option>
             </select>

            <label>挂靠院系：</label>  
            <input type="text" name="relation" class="content_input">

            <label>指导老师：</label>  
            <input type="text" name="teacher" class="content_input">

            <label>负责人名字：</label> 
            <input type="text" name="leader" class="content_input" >

            <label>手机号：</label>  
            <input type="text" name="phone" class="content_input">

            <label>qq：</label> 
            <input type="text" name="qq" class="content_input">

            <label>验证码：</label>
            <div class="verifyBox">
                <input class="content_check1" type="text" name="verify"/>
                <div class="verifyImg">
                   <img src="http://127.0.0.1/club/index.php/Club/Register/verify" id="imghead">
                    <span onclick="changeVerify()">换一张</span>
                </div>
             </div>

             <div class="content_sub">
                <input class="content_submit" type="submit" value="提交">
            </div>
        </form>
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
<script type="text/javascript" src="/club/Public/js/myjs.js"></script>
<script type="text/javascript">
                //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 80; 
          var MAXHEIGHT = 80;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
</script>
</body>
</html>