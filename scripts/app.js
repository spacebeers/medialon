jQuery(document).ready(function () {
    var header = document.querySelector("#header");
    var $window = jQuery(window);

    var headCheck = function() {
        if (jQuery(document).scrollTop() > 45) {
            jQuery('#header').addClass('stuck');
        } else {
            jQuery('#header').removeClass('stuck');
        }
    }

    headCheck()

    var nav = document.querySelector('#nav');
    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    var close = document.querySelector('#close');
    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })

    jQuery(window).scroll(function () {
        headCheck()

        if (jQuery(document).scrollTop() > 150) {
            jQuery('body').addClass('scrolled');
        } else {
            jQuery('body').removeClass('scrolled');
        }
    });

    var containerEl = document.querySelector('.mixer');
    if (containerEl) {
        var mixer = mixitup(containerEl, {
            pagination: {
                limit: 6,
                hidePageListIfSinglePage: true
            },
            controls: {
                toggleDefault: 'none'
            }
        });
    }
});