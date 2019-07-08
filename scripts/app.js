jQuery(document).ready(function () {
    // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    jQuery(".tab_content").hide();
    jQuery(".tab_content:first").show();

    /* if in tab mode */
    jQuery("ul.tabs li").click(function () {

        jQuery(".tab_content").hide();
        var activeTab = jQuery(this).attr("rel");
        jQuery("#" + activeTab).fadeIn();

        jQuery("ul.tabs li").removeClass("active");
        jQuery(this).addClass("active");

        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

    });
    /* if in drawer mode */
    jQuery(".tab_drawer_heading").click(function () {

        jQuery(".tab_content").hide();
        var d_activeTab = jQuery(this).attr("rel");
        jQuery("#" + d_activeTab).fadeIn();

        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(this).addClass("d_active");

        jQuery("ul.tabs li").removeClass("active");
        jQuery("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
    });


	/* Extra class "tab_last"
	   to add border to right side
	   of last tab */
    jQuery('ul.tabs li').last().addClass("tab_last");

    jQuery('#drivers-link').on('click', function(event) {
        var $target = jQuery('[rel="drivers-tab"]')
        if ($target) {
            $target.click()
            jQuery('body, html').animate({
                scrollTop: $target.offset().top - jQuery('body').offset().top + jQuery('body').scrollTop()
            }, 'fast');

        }
    })

    var nav = document.querySelector('#nav');
    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    var close = document.querySelector('#close');
    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })
});