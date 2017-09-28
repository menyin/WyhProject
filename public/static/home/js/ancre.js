/*
* @Author: Marte
* @Date:   2017-08-31 09:28:51
* @Last Modified by:   Marte
* @Last Modified time: 2017-09-14 17:30:29
*/


$(document).ready(function(){
  $("#callback").click(function() {
         window.location.href="/home/about/about.html#call";
  });
    var src_0=location.href;
    var s=src_0.split("#");
    var id_0=s[1];
    var display_0=document.getElementById(id_0);//找到此id
    $(display_0).parent().addClass('show').siblings().removeClass('show');
})

$(document).ready(function(){
  $("#payback").click(function() {
         window.location.href="/home/about/about.html#pay";
  });
    var src_0=location.href;
    var s=src_0.split("#");
    var id_0=s[1];
    var display_0=document.getElementById(id_0);//找到此id
    $(display_0).parent().addClass('show').siblings().removeClass('show');
})

