$(function(){
//显示协议
	$("#protocol").click(function(){
		$(".deal").css("display","block");
		$(".dealAll").css("display","block")
	})
//关闭协议
    $("#closeBtn").click(function(){
		$(".deal").css("display","none");
		$(".dealAll").css("display","none")
	})

	$("#closeDeal").click(function(){
		$(".deal").css("display","none");
		$(".dealAll").css("display","none")
	})
//只有checkbox为选中时，才可以提交
   $("#check").click(function(){
   	 var checkIF=this.checked;
   	 if(checkIF){
   	 	$(".login_btn").attr("disabled",false)
   	 	$(".login_btn").css("background-color","#FF5400");
   	 }else{
   	 	$(".login_btn").attr("disabled",true)
   	    $(".login_btn").css("background-color","#999999");
   	 }
   })
})



//注册页面
$(document).ready(function(){
    $("#loginALL").validate({
        rules:{
            username:{
                required:true,
                minlength:2
            },
            psw1:{
                required:true,
                minlength:6
            },
            psw2:{
                required: true,
                minlength: 6,
                equalTo: "#password1"
            },
            telep:{
                required: true,
                minlength: 6
            },
            sjyzm:{
                 required: true
            }
        },
        messages:{
            username: {
                required: "请输入用户名",
                minlength: "用户名必需由两个字母及以上组成"
              },
            psw1: {
                required: "请输入密码",
                minlength: "密码长度不能小于 5 个字母"
              },
            psw2: {
                required: "请输入密码",
                minlength: "密码长度不能小于 5 个字母",
                equalTo: "两次密码输入不一致"
              },
            telep:{
                required: "请输入手机号码",
                minlength:"请输入正确的手机号码"
            },
            sjyzm:{
                required: "请输入手机雁阵码"
            }
        }
    })
})

