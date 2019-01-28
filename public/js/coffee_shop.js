
$(document).ready(function () {



    //init 
    var pos = $(window).scrollTop();
    fixNavbar();
    //init fix size
    if (pos > 100 && window.matchMedia('(min-width: 767.98px)').matches) {
        Navbar_fadeOut();
    }

    /*text hover animation*/
    $("#about-text,#news-text,#products-text,#shop-text,#cart-text").hover(function () {
        $(this).find('span').stop().fadeIn();
    }, function () {

        if (($(window).scrollTop() > 100) && (window.matchMedia('(min-width: 767.98px)').matches)) {
            $(this).find('span').stop().fadeOut();
        }
    });


    /*navbar scorll animation*/
    $(window).scroll(function () {
        if ((window.matchMedia('(min-width: 767.98px)').matches)) {
            isfade();
        }
    });

    /*navbar fixed animation*/
    $(window).resize(function () {
        fixNavbar();
    });


});
//set navbar text and img fade out
var Navbar_fadeOut = function () {
    $('.fixed-top').css('top', '-5%');        //fixed top
    $("#navbarResponsive span").fadeOut();   //text
    if (!$("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '120px' }, 500, 'linear'); //logo img 
        $("body").addClass('fixed');
    }
}
//set navbar text and img fade in
var Navbar_fadeIn = function () {
    $('.fixed-top').css('top', '0');
    $("#navbarResponsive span").fadeIn();
    if ($("body").hasClass('fixed')) {
        $("#site-logo .logo img").animate({ height: '167px' }, 500, 'linear');
        $("body").removeClass('fixed');
    }
}
//determine screen size ==> fix navbar 
var fixNavbar = function () {

    // less than small size => fadeIn and remove animation
    if (window.matchMedia('(max-width: 767.98px)').matches) {
        Navbar_fadeIn();
        $('#navbar-container').removeClass('container');
        $('#navbar-container').addClass('container-fluid');
        $('#mainNav').removeClass('flex-column');                              //remove navbar vertical
        $('#navbarResponsive').removeClass('vertical');
        $('nav').css("background-color", "antiquewhite").css("opacity", 0.8);  //set bg color and opacity
        $('#mainNav .nav-item a').css("transition", "0s"); //remove hover animation
    }
    // bigger than small size 
    else {
        isfade();
        $('#navbar-container').removeClass('container-fluid');
        $('#navbar-container').addClass('container');
        $('#mainNav').addClass('flex-column');                                //add hover animation and vertical 
        $('#navbarResponsive').addClass('vertical');
        $('nav').css("background-color", "transparent").css("opacity", 1);
        $('#mainNav .nav-item a').css("transition", "0.5s");
    }
}
//determine windows scroll top
var isfade = function () {
    if ($(window).scrollTop() > 100) {                                        //scroll navbar action
        Navbar_fadeOut();
    } else {
        Navbar_fadeIn();
    }
}
