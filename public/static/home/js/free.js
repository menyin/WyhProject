//表单验证
// $(document).ready(function(){
// 	$("#messageform").validate({
// 		rules:{
// 			username:{
// 				required:true,
// 			},
// 			shouji:{
// 				required:true,
// 				minlength:11,
// 				maxlength:11
// 			}
// 		},
// 		messages:{
// 			username:"请输入您的名字",
// 			shouji:"请输入正确的手机号"
// 		}
// 	})
// })

//提交个人信息表单验证，agent页面的表单验证
$(document).ready(function(){
	$("#information").validate({
		rules:{
			username:{
				required:true,
			},
			tel:{
				required:true,
				minlength:11,
				maxlength:11
			},
			code:{
				required:true,
			}
		},
		messages:{
			username:"请输入您的名字",
			tel:"请输入正确的手机号",
			code:"请输入验证码"
		}
	})
})


//留言 product1页面
$(document).ready(function(){
	$("#leaveWord").validate({
		rules:{
			word:{
				required:true,
			},
			username:{
				required:true,
			},
			tel:{
				required:true,
				minlength:11,
				maxlength:11
			}
			// code:{
			// 	required:true,
			// }
		},
		messages:{
			word:"请输入您要里留言的内容",
			username:"请输入您的名字",
			tel:"请输入正确的手机号"
			// code:"请输入验证码"
		}
	})
})

//主体部分的轮播
$(document).ready(function(){

	  $(".lunbo").hover(function(){

	  $(this).find(".qq").show(100);}

	  ,function(){

		$(this).find(".qq").hide(100);

	});
//lunbo
var curr = 0;
	$("#lunboNav a.trigger").each(function(i){
		$(this).click(function(){
			curr = i;

			$("#lunbojs img").eq(i).fadeIn(0).siblings("img").fadeOut(0);
			$(this).addClass("imgSelected").siblings().removeClass("imgSelected");
		});
	});
	var timer = setInterval(function(){
		var go = (curr + 1) % 3;
		$("#lunboNav a.trigger").eq(go).click();
	},3000);
	$("#lunbojs,#next,#prev").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
		var go = (curr + 1) % 3;
		$("#lunboNav a.trigger").eq(go).click();
	},3000);
	});
	$("#next").click(function(){
		if(curr == 4){
			var go = 0;
		}else{
			var go = (curr + 1) % 3;
		}
		$("#lunboNav a.trigger").eq(go).click();
	});
	$("#prev").click(function(){
		if(curr == 0){
			var go = 4;
		}else{
			var go = (curr - 1) % 3;
		}
		$("#lunboNav a.trigger").eq(go).click();
	});
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

//免费定制
$(document).ready(function(){
	$("#Free").validate({
		rules:{
			username:{
				required:true
			},
			mobilephone:{
				required:true,
				minlength:11,
				maxlength:11
			},
			code:{
				required:true
			}
		},
		messages:{
			username:"请输入您的名字",
			mobilephone:"请输入手机号",
			code:"请输入验证码"
		}
	})
})
