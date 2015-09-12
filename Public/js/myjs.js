function idemOver(){
	document.getElementById("ios").src="/club/Public/images/iPhonec.jpg";
}

function idemOut(){
	document.getElementById("ios").src="/club/Public/images/iPhone.jpg";
}

function ademOver(){
	document.getElementById("Android").src="/club/Public/images/androidc.jpg";
}

function ademOut(){
	document.getElementById("Android").src="/club/Public/images/android.jpg";
}

function odemOver(){
	document.getElementById("other").src="/club/Public/images/hrefc.jpg";
}

function odemOut(){
	document.getElementById("other").src="/club/Public/images/href.jpg";
}
function demOver(){
	document.getElementById("code").style.display = "block"
}

function demOut(){
	document.getElementById("code").style.display = "none"
}

 $(".back-btm a").hover(function(){
  $('.triangle-left').css('border-right','30px solid #6CA5D3');
},function(){
  $('.triangle-left').css('border-right','30px solid #3388cb');
});

//回车触发ajax登录
$("#password").keydown(function (event) {
                if (event.which == "13") {//回车键，用.ajax提交表单
                    $(".input_sub").trigger("click");
                }
            });
//ajax登录
$(".input_sub").click(function() {
  $('.input_sub').val('正在登录...');
  var email=$("#name").val();
  var password=$("#password").val();
  var info={"email":email,"password":password};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Login/handle",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1008) { //登陆成功  
                      $('.input_sub').val('登录成功');          
                      location.href="http://127.0.0.1/club/index.php/Club/Index"; 
                    }else {
                      $('.input_sub').val('登录');
                      $(".danger").text(data.data);
                      $(".danger").fadeIn("slow");
                      $(".danger").fadeOut("30000");
                    }

                },
                error:function(){
                   $('.input_sub').val('登录');
                       alert('系统繁忙');
                }
            });
      })


function memberPass(id){
  if(confirm("你确定要通过吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Member/pass",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Member"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

function memberReject(id){
  if(confirm("你确定要驳回吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Member/reject",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Member"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

function memberDelete(id){
  if(confirm("你确定要删除吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Member/delete",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Member"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

  function memberRecover(id){
  if(confirm("你确定要还原吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Member/recover",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Member/recycle"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }
  function check_all(obj,cName) 
{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++)
    {
    checkboxs[i].checked = obj.checked;
    } 
}   
 //添加部门
$(".submit-add").click(function() {
  var departmentName=$(".addDepartInput1").val();
  var introduce=$(".departIntroduce1").val();
  var info={"departmentName":departmentName,"introduce":introduce};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Department/addDepart",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                       location.href="http://127.0.0.1/club/index.php/Club/Department"; 
                    }else {
                       alert(data.data);
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
      })


function DepartDelete(){
  if(confirm("你确定要删除吗？")){
  var checkedList = new Array(); 
 $("input[name='checkbox[]']:checked").each(function() { 
 checkedList.push($(this).val()); 
}); 
   var info={"checkbox":checkedList};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Department/deleteDepart",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Department"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

  function deleteDepart(id){
  if(confirm("你确定要删除吗？")){
    var info={"checkbox":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Department/deleteDepart",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Department"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

      //添加部门
  $(function () {
    $(".showbtn1").click(function () {
        $("#bg1").css({
            display: "block", height: $(document).height()
        });
        var $box = $('.box1');
        $box.css({
            //设置弹出层距离左边的位置
            left: ($("body").width() - $box.width()) / 2 - 20 + "px",
            //设置弹出层距离上面的位置
            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
            display: "block"
        });
    });
    //点击关闭按钮的时候，遮罩层关闭
    $(".close1").click(function () {
        $("#bg1,.box1").css("display", "none");
    });
});

   //修改部门
  function alterDepart(id,name,introduce){
        $('.addDepartInput2').val(name);
        $('.departIntroduce2').val(introduce);
        $("#bg2").css({
            display: "block", height: $(document).height()
        });
        var $box = $('.box2');
        $box.css({
            //设置弹出层距离左边的位置
            left: ($("body").width() - $box.width()) / 2 - 20 + "px",
            //设置弹出层距离上面的位置
            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
            display: "block"
        });

       //修改部门
 $(".submit-alter").click(function() {
  var departmentName=$(".addDepartInput2").val();
  var introduce=$(".departIntroduce2").val();
  var info={"id":id,"departmentName":departmentName,"introduce":introduce};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Department/putDepart",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                       location.href="http://127.0.0.1/club/index.php/Club/Department"; 
                    }else {
                       alert(data.data);
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
      })
    //点击关闭按钮的时候，遮罩层关闭
    $(".close2").click(function () {
        $("#bg2,.box2").css("display", "none");
    });
 }


 //修改活动
  function alterActivity(id,theme,content){
        $('.alterActTheme').val(theme);
        $('.alterActContent').val(content);
        $("#bg3").css({
            display: "block", height: $(document).height()
        });
        var $box = $('.box3');
        $box.css({
            //设置弹出层距离左边的位置
            left: ($("body").width() - $box.width()) / 2 - 20 + "px",
            //设置弹出层距离上面的位置
            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
            display: "block"
        });
 $(".submit-alterAct").click(function() {
  var theme=$(".alterActTheme").val();
  var content=$(".alterActContent").val();
  var info={"id":id,"theme":theme,"content":content};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Activity/putActivity",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                       location.reload(); 
                    }else {
                       alert(data.data);
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
      })
    //点击关闭按钮的时候，遮罩层关闭
    $(".close3").click(function () {
        $("#bg3,.box3").css("display", "none");
    });
 }


//删除活动
function ActivityDelete(){
  if(confirm("你确定要删除吗？")){
  var checkedList = new Array(); 
 $("input[name='checkbox[]']:checked").each(function() { 
 checkedList.push($(this).val()); 
}); 
   var info={"checkbox":checkedList};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Activity/deleteActivity",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Activity"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

  function deleteActivity(id){
  if(confirm("你确定要删除吗？")){
    var info={"checkbox":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Club/Activity/deleteActivity",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Club/Activity"; 
                    }else {
                     alert(data.data); 
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
       }else{
        return 0
       }
      }

      //添加活动
  $(function () {
    $(".showbtn4").click(function () {
        $("#bg4").css({
            display: "block", height: $(document).height()
        });
        var $box = $('.box4');
        $box.css({
            //设置弹出层距离左边的位置
            left: ($("body").width() - $box.width()) / 2 - 20 + "px",
            //设置弹出层距离上面的位置
            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
            display: "block"
        });
    });
    //点击关闭按钮的时候，遮罩层关闭
    $(".close4").click(function () {
        $("#bg4,.box4").css("display", "none");
    });
});
  //添加活动检查
function check() {
  var theme=$(".addActTheme").val();
  var content=$(".addActContent").val();
  var image=$(".ActImage").val();
   if(theme==""){
     alert('请输入活动主题');
     return false;
   }else if(content==""){
      alert('请输入活动内容');
      return false;
   }else if(image==""){
      alert('请上传图片');
      return false;
   }else{return true;}
   }

function changeVerify(){
  $('#imghead')[0].src=$('#imghead')[0].src+'?' + Math.random();
}

  //添加活动检查
function checkRegister() {
  var email=$("input[name='email']").val();
  var password=$("input[name='password']").val();
  var repassword=$("input[name='repassword']").val();
  var name=$("input[name='name']").val();
  var image=$("input[name='image']").val();
  var introduce=$(".content_introduce").val();
  var relation=$("input[name='relation']").val();
  var teacher=$("input[name='teacher']").val();
  var leader=$("input[name='leader']").val();
  var phone=$("input[name='phone']").val();
  var qq=$("input[name='qq']").val();
  var verify=$("input[name='verify']").val();
   if(email==""){
     alert('请输入邮箱');
     $("input[name='email']").focus();
     return false;
   }else if(password==""){
      alert('请输入密码');
      $("input[name='password']").focus();
      return false;
   }else if(repassword==""){
      alert('请再次输入密码');
      $("input[name='repassword']").focus();
      return false;
   }else if(name==""){
      alert('请输入社团名称');
      $("input[name='name']").focus();
      return false;
   }else if(image==""){
      alert('请上传社团logo');
      return false;
   }else if(introduce==""){
      alert('请输入社团简介');
      $(".content_introduce").focus();
      return false;
   }else if(relation==""){
      alert('请输入挂靠院系');
      $("input[name='relation']").focus();
      return false;
   }else if(teacher==""){
      alert('请输入指导老师');
      $("input[name='teacher']").focus();
      return false;
   }else if(leader==""){
      alert('请输入负责人名字');
      $("input[name='leader']").focus();
      return false;
   }else if(phone==""){
      alert('请输入手机号');
      $("input[name='phone']").focus();
      return false;
   }else if(qq==""){
      alert('请输入qq号');
      $("input[name='qq']").focus();
      return false;
   }else if(verify==""){
      alert('请输入验证码');
      $("input[name='verify']").focus();
      return false;
   } else if(password!=repassword){
      alert('两次输入密码不一样');
      $("input[name='password']").focus();
      return false;
   }else{return true;}
   }