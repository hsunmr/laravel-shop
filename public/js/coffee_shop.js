
$(document).ready(function () {

    /* navbar scorll animate*/
    var screen_width = $(window).width();
    var pos = $(this).scrollTop();
    fixNavbar();                            //init fix size
    if (pos != 0 && screen_width >= 768) {
        Navbar_fadeOut();
    }
    //scroll function
    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        var screen_width = $(window).width();

        if (scroll > 100 && screen_width >= 768) {
            Navbar_fadeOut();

        } if (scroll == 0 && screen_width >= 768) {
            Navbar_fadeIn();
        }
    });
    //navbar animate end

    //navbar fixed
    $(window).resize(function () {
        fixNavbar();
    });


});
//set navbar text and img fade out
var Navbar_fadeOut = function () {
    $("#navbarResponsive span").fadeOut();   //text

    if (!$("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '120px' }, 500, 'linear'); //logo img 
        $("body").addClass('fixed');
    }
}
//set navbar text and img fade in
var Navbar_fadeIn = function () {
    $("#navbarResponsive span").fadeIn();
    if ($("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '167px' }, 500, 'linear');
        $("body").removeClass('fixed');
    }
}
var fixNavbar = function () {
    var screen_width = $(window).width();
    // less than small size
    if (screen_width < 768) {
        Navbar_fadeIn();
        $('#mainNav').removeClass('flex-column');                              //remove navbar vertical
        $('#navbarResponsive').removeClass('vertical');
        $('nav').css("background-color", "antiquewhite").css("opacity", 0.8);  //set bg color and opacity
        $('#mainNav .nav-item a').hover(function () {                          //remove hover animation
            $('#mainNav .nav-item a').css("transition", "0s");
        });
    }
    // bigger than small size 
    else if (screen_width > 768) {
        if ($(this).scrollTop() > 100) {                                       //scroll navbar action
            Navbar_fadeOut();
        } else if ($(this).scrollTop() == 0) {
            Navbar_fadeIn();
        }
        $('#mainNav').addClass('flex-column');                                //add hover animation and vertical 
        $('#navbarResponsive').addClass('vertical');
        $('nav').css("background-color", "transparent").css("opacity", 1);
        $('#mainNav .nav-item a').hover(function () {
            $('#mainNav .nav-item a').css("transition", "0.5s");
        });
    }
}
