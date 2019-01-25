
$(document).ready(function () {
    var pos = $(this).scrollTop();
    if (pos != 0) {
        $("#navbarResponsive span").fadeOut();
        if (!$("#site-logo .logo img").hasClass('fixed')) {
            $("#site-logo .logo img").addClass('fixed');
            $("#site-logo .logo img").animate({ height: '120px' }, 500, 'linear');
        }
    }

    $(window).scroll(function () {
        var scroll = $(this).scrollTop();

        if (scroll > 100) {
            $("#navbarResponsive span").fadeOut();

            if (!$("#site-logo .logo img").hasClass('fixed')) {
                $("#site-logo .logo img").addClass('fixed');
                $("#site-logo .logo img").animate({ height: '120px' }, 500, 'linear');
            }
        } if (scroll == 0) {
            $("#navbarResponsive span").fadeIn();
            if ($("#site-logo .logo img").hasClass('fixed')) {
                $("#site-logo .logo img").removeClass('fixed');
                $("#site-logo .logo img").animate({ height: '167px' }, 500, 'linear');
            }

            // $("#site-logo .logo img").removeClass('fixed', { duration: 200, effect: 'blind' });
        }

    });

});
