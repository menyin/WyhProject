$(function(){
	$(".title_list li").click(function(){
		var liindex=$(".title_list li").index(this);
		var liTitle=$(this).html();
		$("#titre").html(liTitle);
		$(this).addClass('on').siblings().removeClass('on');
		$('.product_wrap div.product').eq(liindex).fadeIn(150).siblings("div.product").hide();
	})
})

//product分页效果
$(document).ready(function(){ 
	$(".fy>a").click(function(){
		var liindex1=$(".fy>a").index(this);
		$(this).addClass("p_on").siblings().removeClass("p_on");
 })
})