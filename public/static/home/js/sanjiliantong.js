//城市三级联动代码
    $("#province_id").change(function(){
    var province_id=$(this).val();
    var urlCity = "{:url('Area/getCities')}?id="+province_id;

    $.ajax({
        url: urlCity,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            var option1=$("<option></option>");
            $(option1).val("0");
            $(option1).html("--请选择--");
            $("#city_id").html('');
            $("#area_id").html(option1);

            $.each(data, function(i,row) {
                var option=$("<option></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#city_id").append(option);
            });
        }
        
    });
});

$("#city_id").change(function(){
    var city_id=$(this).val();
    var urlArea = "{:url('Area/getAreas')}?id="+city_id;

    $.ajax({
        url:urlArea,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            $("#area_id").html('');
            $.each(data, function(i,row) {
                var option=$("<option></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#area_id").append(option);
            });
        }
    });
});
$("#category_f").change(function(){
    var pid=$(this).val();
    var urlCate = "{:url('Category/getCategoryByPid')}?id="+pid;

    $.ajax({
        url:urlCate,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            $("#category_id").html('');
            $.each(data, function(i,row) {
                var option=$("<option></option>");
                $(option).val(row.id);
                $(option).html(row.title);

                $("#category_id").append(option);
            });
        }
    });
});

