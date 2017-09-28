$("#province_id").change(function(){
    var province_id=$(this).val();
    var urlCity = "/admin/area/getCities?id="+province_id;

    $.ajax({
        url: urlCity,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            var option1=$("<option value='0'></option>");
            $(option1).val("0");
            $(option1).html("--请选择--");
            $("#city_id").html('');
            $("#area_id").html(option1);

            $.each(data, function(i,row) {
                var option=$("<option value='0'></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#city_id").append(option);
            });

            var city_id = $("#city_id").val();

            var urlArea = "/admin/area/getareas?id="+city_id;

            $.ajax({
                url:urlArea,
                Type:"GET",
                data:"",
                dataType:"json",
                success:function(data){
                    $("#area_id").html('');
                    $.each(data, function(i,row) {
                        var option=$("<option value='0'></option>");
                        $(option).val(row.id);
                        $(option).html(row.name);

                        $("#area_id").append(option);
                    });
                }
            });

        }
        
    });
});

$("#city_id").change(function(){
    var city_id=$(this).val();
    var urlArea = "/admin/area/getareas?id="+city_id;

    $.ajax({
        url:urlArea,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            $("#area_id").html('');
            $.each(data, function(i,row) {
                var option=$("<option value='0'></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#area_id").append(option);
            });
        }
    });
});