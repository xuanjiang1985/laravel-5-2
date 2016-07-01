$(function(){
    $("#login-a").click(function(){
        if($("#cps-logout").hasClass("hidden")) {
            $("#cps-logout").removeClass("hidden");
        } else {
            $("#cps-logout").addClass("hidden");
        }
    });
    //returnUrl
    $("#login").click(function(){
        window.open("/login?returnUrl=" + encodeURIComponent(window.location.href), "_self");
    });
});
