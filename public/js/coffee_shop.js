$(document).ready(function () {

    //init 
    var pos = $(window).scrollTop();
    fixNavbar();
    scroll_bottom_fade();

    //toggle button
    $("#menuBtn").click(function(){
        $("body").toggleClass("is-open") 
    });
    //init fix size
    if (pos > 100 && window.matchMedia('(min-width: 991.98px)').matches) {
        Navbar_fadeOut();
    }
    /*----------------navbar scorll animation-------------------*/
    $(window).scroll(function () {
        if ((window.matchMedia('(min-width: 991.98px)').matches)) {
            isfade();
        }
        scroll_bottom_fade();
    });

    /*----------------text hover animation-------------------*/
    $("#about-text,#news-text,#products-text,#shop-text,#cart-text").hover(function () {
        $(this).find('span').stop().fadeIn();
    }, function () {

        if (($(window).scrollTop() > 100) && (window.matchMedia('(min-width: 991.98px)').matches)) {
            $(this).find('span').stop().hide();
            
        }
    });

    /*----------------navbar fixed animation----------------*/
    $(window).resize(function () {
        fixNavbar();
    });

    $(".quantity").change(function(){

        $id = $(this).attr('data-id');
        $qty = $(this)[0].value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'cart/' + $id,
            type: 'PATCH',
            data: {quantity: $qty},
            success: function(res) {
                window.location.reload();
            }
        });
    });
    $(".delete_button").click(function(){

        $id = $(this).attr('data-id');
        console.log($id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: 'cart/' + $id,
            data: {quantity:''},
            success: function(res) {
                window.location.reload();
            }
        });
    });


});
//set navbar text and img fade out
var Navbar_fadeOut = function () {

    if (!$("body").hasClass('fixed')) {

        if (window.matchMedia('(min-width: 1025px)').matches)
            $('.fixed-top').css('top', '-5%');        //fixed top
        else
            $('.fixed-top').css('top', '-4%');
            
        $("#navbarResponsive span").stop().hide();   //text
        $("#site-logo .logo img").stop().animate({ height: '130px', width: '250px' }, 500, 'linear'); //logo img 
        $("body").addClass('fixed');
    }
}
//set navbar text and img fade in
var Navbar_fadeIn = function () {

    if ($("body").hasClass('fixed')) {
        $('.fixed-top').css('top', '-1%');
        $("#navbarResponsive span").stop().fadeIn();
        $("#site-logo .logo img").stop().animate({ height: '150px', width: '280px' }, 500, 'linear');
        $("body").removeClass('fixed');
    }
}
//determine screen size ==> fix navbar 
var fixNavbar = function () {

    // less than small size => fadeIn and remove animation
    if (window.matchMedia('(max-width: 991.98px)').matches) {
        Navbar_fadeIn();       
        $('.fixed-top').css('top', '0');               //change header size
        $('#mainNav').removeClass('flex-column vertical');                              //remove navbar vertical
    }
    // bigger than small size 
    else {
        isfade();
        $('#mainNav').addClass('flex-column vertical');                          //add hover animation and vertical 

    }
}
//determine windows scroll top
var isfade = function () {

    if ($(window).scrollTop() > 150) {                                        //scroll navbar action
        Navbar_fadeOut();
    } else {
        Navbar_fadeIn();
    }
}
var scroll_bottom_fade = function () {

    $scroll_bottom = ($(window).scrollTop() + $(window).height());
    if ($('.about-des').length > 0 && $scroll_bottom >= $('.about-des').offset().top )
        $('.about-des').css('opacity', 1);
    if ($('.news-des').length > 0 && $scroll_bottom >= $('.news-des').offset().top && (window.matchMedia('(min-width: 767.98px)').matches))
        $('.news-des').css('transform', 'translate3d(0,0,0)');
    if ($scroll_bottom >= $('.img_wrap').offset().top )
        $('.img_wrap img').css('opacity', 1);
}

$('.carousel').carousel({
    interval: 8000,
    pause: false
})
