  $(document).ready(function(){
   (function ($) {
            $.fn.AddSelect = function (opation) {
                var _arg = $.extend({
                    data: ""
                    , id: "a"
                    , name: "b"
                  , link: "c"
                }, opation);
                var _this1 = this;
                if (_arg.data) {
                    var _dt = _arg.data,_a = _arg.id,_b=_arg.name,_c=_arg.link;
                    var _html = "";
                    var _prams = []
                    _prams[0] = _dt;
                    _html += '<select>'; //初级设置
                    for (var i = 0; i < _dt.length; i++) {
                        _html += '<option value="' + _dt[i][_a] + '|' + (_dt[i][_c] == null ? null : i) + '">' + _dt[i][_b] + '</option>';
                    }
                    _html += '</select>';
                    $(_this1).html(_html);
                    function _select1() {
                        $(_this1).children("select").change(function () {
                            var _this2 = this;
                            var _val = $(_this2).val().split("|")[1];
                            $(_this2).nextAll("select").remove();
                            if (_val % 1 == 0) {
                                var _index = $(_this2).index();
                                var _str = "";
                                _prams[_index + 1] = _prams[_index][_val][_c];//一条线放一个数组 不同线重置
                                //console.log(_prams[_index + 1])
                                _str += '<select>';
                                for (var i = 0; i < _prams[_index + 1].length; i++) {
                                    _str += '<option value="' + _prams[_index + 1][i][_a] + '|' + (_prams[_index + 1][i][_c] == null ? null : i) + '">' + _prams[_index + 1][i][_b] + '</option>';
                                }
                                _str += '</select>';
                                $(_this2).after(_str);
                                $(_this1).children("select").unbind("change");
                                _select1();
                            }
                        })
                    }
                    _select1();
                }
            }
        })(jQuery)

        var _json = [
			    //数据1
                //
		      {
			   "v": "1",
			   "n": "20",
			   "s": [{"v": "3","n": "21"},
				     { "v": "4","n": "22"},
				     { "v": "5","n": "23"}]
		     },
				//数据2
		     {
			   "v": "2",
			   "n": "30",
			   "s": [{"v": "3","n": "31"},
				     { "v": "4","n": "32"},
				     { "v": "5","n": "33"}]
		     },
				//数据3
		     {
			   "v": "3",
			   "n": "40",
			   "s": [{"v": "3","n": "41"},
				     { "v": "4","n": "42"},
				     { "v": "5","n": "43"}]
		     }
        ]

console.log(treeCategory);
console.log(_json);
        $("#textlist").AddSelect({
            data: _json
            , id: "v"
            , name: "n"
            , link: "s"
        })
   })