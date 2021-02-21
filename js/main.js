   
$('document').ready(function(){

    
   
    //nav show and hide
    $(".sidebar_close_button").click(function(){
        $("nav").slideUp();
        $('main').removeClass("col-11 offset-1");
       
        $('.sidebar_control_div').css("display","inline-block");
    });

    $(".sidebar_control_div").click(function(){
        $("nav").slideDown();
        $("main").addClass("col-11 offset-1");
        $('.sidebar_control_div').css("display","none");
    });

    //dashboard menu
    $("[data-toggle='tooltip']").tooltip();

    //active menu

    $(function($) {
        let url = window.location.href;
        $('.sidebar_nav > ul > li > a').each(function() {
            if (this.href === url) {
                $(this).parent().addClass('active');
            }
        });
    });
   
    //hovering main_menu and sub_menu
    $(".mainmenu_dashboard").mouseenter(function(){  
        $('.mainmenu_dashboard > a').css("color","white");
    });

    $(".mainmenu_dashboard").mouseleave(function(){
        $('.mainmenu_dashboard > a').css("color","silver");
        
    });

    $(".mainmenu_manageOrders").mouseenter(function(){
        $('.submenu_manageOrders').show();
        $('.mainmenu_manageOrders > a > i').addClass("fa-angle-right");
        $('.mainmenu_manageOrders > a').css("color","white");
    });

    $(".mainmenu_manageOrders").mouseleave(function(){
        $('.submenu_manageOrders').hide();
        $('.mainmenu_manageOrders > a > i').removeClass("fa-angle-right");
        $('.mainmenu_manageOrders > a').css("color","silver");
    });

    
    $(".mainmenu_showStastics").mouseenter(function(){
        $('.submenu_showStastics').show();
        $('.mainmenu_showStastics > a > i').addClass("fa-angle-right")
        $('.mainmenu_showStastics > a').css("color","white");
    });

    $(".mainmenu_showStastics").mouseleave(function(){
        $('.submenu_showStastics').hide();
        $('.mainmenu_showStastics > a > i').removeClass("fa-angle-right")
        $('.mainmenu_showStastics > a').css("color","silver");
    });


    $(".mainmenu_help").mouseenter(function(){  
        $('.mainmenu_help > a').css("color","white");
    });

    $(".mainmenu_help").mouseleave(function(){
        $('.mainmenu_help > a').css("color","silver");
        
    });
    //submenu of show stastics
    $(".submenu_showStastics > .showStastics_salesStastics").mouseenter(function(){  
        $('.submenu_showStastics > .showStastics_salesStastics > a').css("color","white");
    });

    $(".submenu_showStastics > .showStastics_salesStastics").mouseleave(function(){  
        $('.submenu_showStastics > .showStastics_salesStastics > a').css("color","black");
    });

    $(".submenu_showStastics > .showStastics_orderStastics").mouseenter(function(){  
        $('.submenu_showStastics > .showStastics_orderStastics > a').css("color","white");
    });

    $(".submenu_showStastics > .showStastics_orderStastics").mouseleave(function(){  
        $('.submenu_showStastics > .showStastics_orderStastics > a').css("color","black");
    });

    //submenu of manage orders
    
    $(".submenu_manageOrders > .manageOrders_addNewOrders").mouseenter(function(){  
        $('.submenu_manageOrders > .manageOrders_addNewOrders > a').css("color","white");
    });

    $(".submenu_manageOrders > .manageOrders_addNewOrders").mouseleave(function(){  
        $('.submenu_manageOrders > .manageOrders_addNewOrders > a').css("color","black");
    });

    $(".submenu_manageOrders > .manageOrders_seeAllOrders").mouseenter(function(){  
        $('.submenu_manageOrders > .manageOrders_seeAllOrders > a').css("color","white");
    });

    $(".submenu_manageOrders > .manageOrders_seeAllOrders").mouseleave(function(){  
        $('.submenu_manageOrders > .manageOrders_seeAllOrders > a').css("color","black");
    });

});




