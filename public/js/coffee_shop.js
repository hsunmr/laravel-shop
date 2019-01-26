
$(document).ready(function () {

    /* navbar scorll animate*/
    var screen_width = $(window).width();
    var pos = $(this).scrollTop();
    fixNavbar();  
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

    $(window).resize(function () {
        fixNavbar();
    });


});
var Navbar_fadeOut = function () {
    $("#navbarResponsive span").fadeOut();   //text

    if (!$("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '120px' }, 500, 'linear'); //logo img 
        $("body").addClass('fixed');
    }
}
var Navbar_fadeIn = function () {
    $("#navbarResponsive span").fadeIn();
    if ($("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '167px' }, 500, 'linear');
        $("body").removeClass('fixed');
    }
}
var fixNavbar = function () {
    var screen_width = $(window).width();
    if (screen_width < 768) {
        $('#mainNav').removeClass('flex-column');
        $('#navbarResponsive').removeClass('vertical');
    } else {
        $('#mainNav').addClass('flex-column');
        $('#navbarResponsive').addClass('vertical');
    }
}
