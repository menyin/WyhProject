$(document).ready(function(){
function selectModel() {
        var $box = $('div.header-selct-box');
        var $option = $('ul.header-selct-opation', $box);
        var $txt = $('div.header-selct-text', $box);
        var speed = 10;
        /* 当机某个下拉列表时，显示当前下拉列表的下拉列表框* 并隐藏页面中其他下拉列表
     */
        $txt.click(function(e) {
            $("#up-down").attr("src","/static/home/images/public/arrow4.png");
            $option.not($(this).siblings('ul.header-selct-opation')).slideUp(speed,
            function() {
                int($(this));
            });
            $(this).siblings('ul.header-selct-opation').slideToggle(speed,
            function() {
                int($(this));
            });
            return false;
        });
        //点击选择，关闭其他下拉
        /*
     * 为每个下拉列表框中的选项设置默认选中标识 data-selected
     * 点击下拉列表框中的选项时，将选项的 data-option 属性的属性值赋给下拉列表的 data-value 属性，并改变默认选中标识 data-selected
     * 为选项添加 mouseover 事件
     */
        $option.find('li').each(function(index, element) {
            if ($(this).hasClass('seleced')) {
                $(this).addClass('data-selected');
            }
        }).mousedown(function() {
            //赋值操作
            $(this).parent().siblings('div.header-selct-text').text($(this).text()).attr('data-value', $(this).attr('data-option'));
            $option.slideUp(speed,
            function() {
                int($(this));
                $("#up-down").attr("src","/static/home/images/public/arrow3.png");
            });
            $(this).addClass('seleced data-selected').siblings('li').removeClass('seleced data-selected');
            return false;
        }).mouseover(function() {
            $(this).addClass('seleced').siblings('li').removeClass('seleced');
        });
        //点击文档，隐藏所有下拉
        $(document).click(function(e) {
            $option.slideUp(speed,
            function() {
                int($(this));
                $("#up-down").attr("src","/static/home/images/public/arrow3.png");
            });
        });
        //初始化默认选择
        function int(obj) {
            obj.find('li.data-selected').addClass('seleced').siblings('li').removeClass('seleced');
        }
    }
    $(function() {
        selectModel();
    });
    })

