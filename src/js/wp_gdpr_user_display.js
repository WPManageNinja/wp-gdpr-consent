jQuery(document).ready(function ($) {
    function wpGdprGetCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function wpGdprSetCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    
    let $wrapper = jQuery('.wpgdpr_wrapper');
    let delay = gpd_settings_vars.delay * 1000;
    let duration = gpd_settings_vars.duration;
    let declined_duration = gpd_settings_vars.declined_duration;
    
    jQuery('.gdprAcptBtn').on('click', function(e) {
        e.preventDefault();
        wpGdprSetCookie("wp_gdpr_permission", 'accepted', duration);
        $wrapper.remove();
        jQuery('body').trigger('wp_gdpr_permission_accepted', e);
    });
    jQuery('.gdprDecBtn').on('click', function(e) {
        e.preventDefault();
        wpGdprSetCookie("wp_gdpr_permission", 'declined', declined_duration);
        $wrapper.remove();
        jQuery('body').trigger('wp_gdpr_permission_declined', e);
    });
    if(delay && delay > 1000) {
        setTimeout(() => {
            $wrapper.remove();
        }, delay)
    }
});