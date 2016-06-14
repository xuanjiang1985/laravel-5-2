$(document).ready(function () {
    //侧边栏东华
    $(".aside-ul-li").click(function () {
        if ($(this).children("ul").is(":visible")) {
            $(this).children("ul").hide(300);
            $(this).css("background-color","");
            $(".aside-ul-li").children("span").removeClass("icon-angle-down");
            $(".aside-ul-li").children("span").addClass("icon-angle-left");

        } else {
        $(".aside-ul-li").css("background-color","");
        $(".aside-ul-li").children("span").removeClass("icon-angle-down");
        $(".aside-ul-li").children("span").addClass("icon-angle-left");
        $(".aside-ul-li").children("ul").hide(300);
        $(this).children("ul").show(300);
        $(this).css("background-color","#292929");
        $(this).children("span").removeClass("icon-angle-left");
        $(this).children("span").addClass("icon-angle-down");
        }
    });
        //内容导航条触发侧边栏打开
        $("aside").ready(function() {
            var location = window.location.pathname;
            var data = location.substr(1);
            var data = data.split("/");
            var data = data.slice(0,3);
            var new_location = "/"+data[0]+"/"+data[1]+"/"+data[2];
            $("aside a[href='"+ new_location +"']").trigger("click");
            $("aside a[href='"+ new_location +"']").css("color","white");
            });
        //响应式弹窗-xs
            $("#xs-menu").click(function(){
                if($("#aside-center").is(":hidden")){

                $("#aside-center").addClass("aside-fix");
                $("#aside-center").removeClass("hidden-xs");
                } else {
                    $("#aside-center").removeClass("aside-fix");
                    $("#aside-center").addClass("hidden-xs");
                }
            });
});