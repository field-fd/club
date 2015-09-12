
//回车触发ajax登录
$(".check").keydown(function (event) {
                if (event.which == "13") {//回车键，用.ajax提交表单
                    $(".submit").trigger("click");
                }
            });
//ajax登录
$(".submit").click(function() {
  var username=$(".username").val();
  var password=$(".password").val();
  var verify=$(".check").val();
  var info={"username":username,"password":password,"verify":verify};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Login/handle",
                data:info,
                type:"POST",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1008) { //登陆成功           
                      location.href="http://127.0.0.1/club/index.php/Admin/Club/index"; 
                    }else if(data.status == 1004) { //验证码错误 
                        $('.verify')[0].src=$('.verify')[0].src+'?' + Math.random();
                    }else {
                      alert(data.data);
                    }

                },
                error:function(){
                       alert('系统繁忙');
                }
            });
      })
function changeVerify(){
  $('.verify')[0].src=$('.verify')[0].src+'?' + Math.random();
}


 $(".back-btm a").hover(function(){
  $('.triangle-left').css('border-right','30px solid #6CA5D3');
},function(){
  $('.triangle-left').css('border-right','30px solid #3388cb');
});

function clubPass(id){
  if(confirm("你确定要通过吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Club/pass",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Club"; 
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

function clubReject(id){
  if(confirm("你确定要驳回吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Club/reject",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Club"; 
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

function clubDelete(id){
  if(confirm("你确定要删除吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Club/delete",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Club"; 
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

  function clubRecover(id){
  if(confirm("你确定要还原吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Club/recover",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Club/recycle"; 
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




  function activityPass(id){
  if(confirm("你确定要通过吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Activity/pass",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Activity"; 
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

function activityReject(id){
  if(confirm("你确定要驳回吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Activity/reject",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Activity"; 
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

function activityDelete(id){
  if(confirm("你确定要删除吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Activity/delete",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Activity"; 
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

  function activityRecover(id){
  if(confirm("你确定要还原吗？")){
  var info={"id":id};
  $.ajax({
                url:"http://127.0.0.1/club/index.php/Admin/Activity/recover",
                data:info,
                type:"GET",
                dataType: "json",
                success:function(data) {
                    if (data.status == 1000) { //成功            
                      location.href="http://127.0.0.1/club/index.php/Admin/Activity/recycle"; 
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