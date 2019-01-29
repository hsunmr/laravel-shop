$(document).ready(function () {

    //init 
    var pos = $(window).scrollTop();
    fixNavbar();
    //init fix size
    if (pos > 100 && window.matchMedia('(min-width: 767.98px)').matches) {
        Navbar_fadeOut();
    }

    /*----------------text hover animation-------------------*/
    $("#about-text,#news-text,#products-text,#shop-text,#cart-text").hover(function () {
        $(this).find('span').stop().fadeIn();
    }, function () {

        if (($(window).scrollTop() > 100) && (window.matchMedia('(min-width: 767.98px)').matches)) {
            $(this).find('span').stop().fadeOut();
        }
    });
    /*----------------text hover animation end-------------------*/

    /*----------------navbar scorll animation-------------------*/
    $(window).scroll(function () {
        if ((window.matchMedia('(min-width: 767.98px)').matches)) {
            isfade();
        }
    });
     /*--------------navbar scorll animation end------------ -*/


    /*----------------navbar fixed animation----------------*/
    $(window).resize(function () {
        fixNavbar();
    });
    /*----------------navbar fixed animation----------------*/


});
//set navbar text and img fade out
var Navbar_fadeOut = function () {
     if(window.matchMedia('(min-width: 1025px)').matches)
         $('.fixed-top').css('top', '-5%');        //fixed top
     else
         $('.fixed-top').css('top', '-3%');   
    $("#navbarResponsive span").stop().fadeOut();   //text
    if (!$("body").hasClass('fixed')) {
        $("#site-logo .logo img").stop().animate({ height: '130px', width: '80%' }, 500, 'linear'); //logo img 
        $("body").addClass('fixed');
    }
}
//set navbar text and img fade in
var Navbar_fadeIn = function () {
   
    $('.fixed-top').css('top', '-1%');   

    $("#navbarResponsive span").stop().fadeIn();
    if ($("body").hasClass('fixed')) {
        $("#site-logo .logo img").stop().animate({ height: '150px', width: '100%' }, 500, 'linear');
        $("body").removeClass('fixed');
    }
}
//determine screen size ==> fix navbar 
var fixNavbar = function () {

    // less than small size => fadeIn and remove animation
    if (window.matchMedia('(max-width: 767.98px)').matches) {
        Navbar_fadeIn();
       // $('.image-wrapper img').css('height','60vh');                          //change header size
         $('#mainNav').removeClass('flex-column');                              //remove navbar vertical
         $('#navbarResponsive').removeClass('vertical');
    }
    // bigger than small size 
    else {
        isfade();
      //  $('.image-wrapper img').css('height','98vh');

         $('#mainNav').addClass('flex-column');                                //add hover animation and vertical 
         $('#navbarResponsive').addClass('vertical');
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

$('.carousel').carousel({
    interval:8000,
    pause: false
})
