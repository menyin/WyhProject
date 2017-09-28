	    var wait = 60;
        function time(btn) {       
            var mobilephone = $("#mobilephone").val();
            var patrnPhone  = /^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/;
            if (!patrnPhone.test(mobilephone)) {alert('手机号码格式不正确，请确认后在输入');return;};
 
            btn.removeAttribute("disabled");
            if (wait == 60) {
                $.post("./mobile_validate_code", { "mobile": mobilephone },
                    function(data){
                }, "json");
            }
 
            if (wait == 0) {
              btn.removeAttribute("disabled");
              btn.value = "免费获取验证码";
              wait = 60;
            } else {
              btn.setAttribute("disabled", true);
              btn.value = wait + "秒后重新获取验证码";
              wait--;
              setTimeout(function () {
                  time(btn);
              },
              1000)
            }
        }