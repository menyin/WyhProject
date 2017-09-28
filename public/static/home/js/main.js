 //首页底部效果
$(document).ready(function(){
	$(".other-title-list li").mouseover(function(){
		var liindex1=$(".other-title-list li").index(this);
		$(this).addClass("on").siblings(".other-title-list>li").removeClass("on");
		$(".other-product-wrap div.other-product").eq(liindex1).fadeIn(150).siblings('div.other-product').hide();
		var liwidth=$(".other-title-list li").width();
		$(".other-title-list p").stop(false,true).animate({"left":liindex1*liwidth+"px"},300);
	})
})
//城市三级联动调用代码
$("#city").click(function (e) {
	SelCity(this,e);
    console.log("inout",$(this).val(),new Date())
});

$("#f-city").click(function (e) {
	SelCity(this,e);
    console.log("inout",$(this).val(),new Date())
});
$("#f_city_buy").click(function (e) {
	SelCity(this,e);
    console.log("inout",$(this).val(),new Date())
});
//头部固定导航
$(document).ready(function(){
	var H=105;
	$(window).scroll(function(){
		var S=$(document).scrollTop();
		if(S>H){
			$("#nav").css({"position":"fixed","top":0});
		}else{
			$("#nav").css({"position":"static"});
		}
	})

})
//保险标题的小轮播
$(document).ready(function(){
	var curr2 = 0;
	$("#insuer-list a.insuer-trigger").each(function(a){
		$(this).click(function(){
			curr2 = a;
			$(".insuerlunbo .insurelb").eq(a).fadeIn(0).siblings().fadeOut(0);
			$(this).addClass("insuer-selected").siblings().removeClass("insuer-selected");
		});
	});

	var timer1 = setInterval(function(){
		var go1 = (curr2 + 1) % 3;
		$("#insuer-list a.insuer-trigger").eq(go1).click();
	},3000);
	$("#insuer-list").hover(function(){
		clearInterval(timer1);
	},function(){
		timer1 = setInterval(function(){
		var go1 = (curr2 + 1) % 3;
		$("#insuer-list a.insuer-trigger").eq(go1).click();
	},3000);
	});
})
//about页面的选择特效
$(document).ready(function(){
	$(".title-list li").click(function(){
		var lindex=$(".title-list li").index(this);
		$(this).addClass('on').siblings().removeClass('on');
		$('.product-wrap div.product').eq(lindex).fadeIn(150).siblings('div.product').hide();
	});
})

//选择代理人界面 condition区域鼠标选择效果
$(document).ready(function(){
    $(".condition-choose1>li").click(function(){
        var liindex1=$(".condition-choose1>li").index(this);
        $(this).addClass("condition-on").siblings(".condition-choose1>li").removeClass("condition-on");
    })
    $(".condition-choose2>li").click(function(){
        var liindex1=$(".condition-choose2>li").index(this);
        $(this).addClass("condition-on").siblings(".condition-choose2>li").removeClass("condition-on");
    })
    $(".condition-choose3>li").click(function(){
        var liindex1=$(".condition-choose3>li").index(this);
        $(this).addClass("condition-on").siblings(".condition-choose3>li").removeClass("condition-on");
    })
    $(".condition-choose4>li").click(function(){
        var liindex1=$(".condition-choose4>li").index(this);
        $(this).addClass("condition-on").siblings(".condition-choose4>li").removeClass("condition-on");
    })
    $(".condition-choose5>li").click(function(){
        var liindex1=$(".condition-choose5>li").index(this);
        $(this).addClass("condition-on").siblings(".condition-choose5>li").removeClass("condition-on");
    })
})


//无缝滚动效果 已经封装 在需要的页面调用
$(document).ready(function(){
(function($){
	$.fn.kxbdMarquee=function(options){
		var opts=$.extend({},$.fn.kxbdMarquee.defaults, options);

		return this.each(function(){
			var $marquee=$(this);				//滚动元素容器
			var _scrollObj=$marquee.get(0);		//滚动元素容器DOM
			var scrollW=$marquee.width();		//滚动元素容器的宽度
			var scrollH=$marquee.height();		//滚动元素容器的高度
			var $element=$marquee.children();	//滚动元素
			var $kids=$element.children();		//滚动子元素
			var scrollSize=0;					//滚动元素尺寸

			//滚动类型，1左右，0上下
			var _type=(opts.direction=="left"||opts.direction=="right") ? 1:0;

			//防止滚动子元素比滚动元素宽而取不到实际滚动子元素宽度
			$element.css(_type?"width":"height",10000);

			//获取滚动元素的尺寸
			if(opts.isEqual){
				scrollSize=$kids[_type?"outerWidth":"outerHeight"]()*$kids.length;
			}else{
				$kids.each(function(){
					scrollSize+=$(this)[_type?"outerWidth":"outerHeight"]();
				});
			};

			//滚动元素总尺寸小于容器尺寸，不滚动
			if(scrollSize<(_type?scrollW:scrollH)){return;};

			//克隆滚动子元素将其插入到滚动元素后，并设定滚动元素宽度
			$element.append($kids.clone()).css(_type?"width":"height",scrollSize*2);

			var numMoved=0;
			function scrollFunc(){
				var _dir=(opts.direction=="left"||opts.direction=="right") ? "scrollLeft":"scrollTop";
				if (opts.loop>0) {
					numMoved+=opts.scrollAmount;
					if(numMoved>scrollSize*opts.loop){
						_scrollObj[_dir]=0;
						return clearInterval(moveId);
					};
				};

				if(opts.direction=="left"||opts.direction=="up"){
					var newPos=_scrollObj[_dir]+opts.scrollAmount;
					if(newPos>=scrollSize){
						newPos-=scrollSize;
					}
					_scrollObj[_dir]=newPos;
				}else{
					var newPos=_scrollObj[_dir]-opts.scrollAmount;
					if(newPos<=0){
						newPos += scrollSize;
					};
					_scrollObj[_dir]=newPos;
				};
			};

			//滚动开始
			var moveId=setInterval(scrollFunc, opts.scrollDelay);

			//鼠标划过停止滚动
			$marquee.hover(function(){
				clearInterval(moveId);
			},function(){
				clearInterval(moveId);
				moveId=setInterval(scrollFunc, opts.scrollDelay);
			});
		});
	};

	$.fn.kxbdMarquee.defaults={
		isEqual:true,		//所有滚动的元素长宽是否相等,true,false
		loop: 0,			//循环滚动次数，0时无限
		direction: "left",	//滚动方向，"left","right","up","down"
		scrollAmount:1,		//步长
		scrollDelay:20		//时长

	};

	$.fn.kxbdMarquee.setDefaults=function(settings) {
		$.extend( $.fn.kxbdMarquee.defaults, settings );
	};
})(jQuery);
})

//找保险页面
$(document).ready(function(){
	$(".find-kind-top-ul>li").click(function(){
		var liindex1=$(".find-kind-top-ul>li").index(this);
		$(this).addClass("kind-on").siblings(".find-kind-top-ul>li").removeClass("kind-on");
	})
})
//了解保险页面轮播
$(document).ready(function(){
	var curr2 = 0;
	$("#headlineNav a.trigger").each(function(a){
		$(this).click(function(){
			curr2 = a;
			$("#headlinejs img").eq(a).fadeIn(0).siblings("img").fadeOut(0);
			$(this).addClass("imgSelected").siblings().removeClass("imgSelected");
		});
	});

	var timer1 = setInterval(function(){
		var go1 = (curr2 + 1) % 5;
		$("#headlineNav  a.trigger").eq(go1).click();
	},3000);
	$("#headlineNav").hover(function(){
		clearInterval(timer1);
	},function(){
		timer1 = setInterval(function(){
		var go1 = (curr2 + 1) % 5;
		$("#headlineNav a.trigger").eq(go1).click();
	},3000);
	});
})
//产品详情页面
$(document).ready(function(){
	var num = 650;
	$(window).scroll(function(){
		var iTop = $(window).scrollTop();//鼠标滚动的距离4
		if(iTop>num){
		     $(".flow-list").css("position","fixed")
		               .css("top","40px")
		               .css("z-index","10000")
		     $(".flow-list li").css("border","0")
			}else{
				$(".flow-list").css("position","static")

			}

	})

	$(".flow-list>ul>li").click(function(){
		var liindex2=$(".flow-list>ul>li").index(this);
		$(this).addClass("list-on").siblings(".flow-list>ul>li").removeClass("list-on");
	})

})

$(document).ready(function(){
	$(".order").click(function(){
		$("#mask").css("display","block");
	    $("#login").css("display","block");
	})
   $("#close").click(function(){
   	    $("#mask").css("display","none");
	    $("#login").css("display","none");
   })
})


//保险问吧 main区域 tab选项卡
$(document).ready(function(){
	$(".ask-main-fl-title>ul>li").click(function(){
		var liinde=$(".ask-main-fl-title>ul>li").index(this);
		$(this).addClass("ask-main-on").siblings().removeClass("ask-main-on");
		$(".ask-main-product-wrap div.ask-main-product").eq(liinde).fadeIn(100).siblings('div.ask-main-product').hide(100);
	})
})
//保险问吧 main区域 条件选择
$(document).ready(function(){
	$(".ask-problem>a").click(function(){
	    var liindex=$(".ask-problem>a").index(this);
		$(this).addClass("ask-problem-on").siblings(".ask-problem>a").removeClass("ask-problem-on");
	})

})
//保险问吧 底部区域的选项卡
$(document).ready(function(){
	$(".answer-top>ul>li").click(function(){
		var liinde=$(".answer-top>ul>li").index(this);
		$(this).addClass("answer-on").siblings().removeClass("answer-on");
		$(".answer-product-wrap div.answer-product").eq(liinde).fadeIn(100).siblings('div.answer-product').hide(100);
	})
})
//保险问吧 底部区域的页码
$(document).ready(function(){
	$(".answer-list>a").click(function(){
	    var liindex=$(".answer-list>a").index(this);
		$(this).addClass("answer-list-on").siblings(".answer-list>a").removeClass("answer-list-on");
	})
})

//回答区域的弹出框
$(document).ready(function(){
	$(".answer-avatar>span").click(function(){
		$(".mask").css("display","block");
	    $("#ask-problem").css("display","block");
	})
   $("#close1").click(function(){
   	    $(".mask").css("display","none");
	    $("#ask-problem").css("display","none");
   })
})
