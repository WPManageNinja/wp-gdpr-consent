var gdprDecBtn = document.getElementsByClassName('gdprDecBtn');
var gdprAcptBtn = document.getElementsByClassName('gdprAcptBtn');

var banner_top = document.getElementById('wpgdpr_banner_top');
var banner_bottom = document.getElementById('wpgdpr_banner_bottom');
var banner_right = document.getElementById('wpgdpr_banner_right');
var banner_left = document.getElementById('wpgdpr_banner_left');

var permission = getCookie("wp_gdpr_permission");

if ( permission != "") {

    if( banner_top ) {
        banner_top.remove();
    }
    else if( banner_bottom ) {
        banner_bottom.remove();
    }
    else if( banner_right ) {
        banner_right.remove();
    }
    else if( banner_left ) {
        banner_left.remove();
    }

} else {

    for(var i = 0; i < gdprAcptBtn.length; i++) {

        gdprAcptBtn[i].addEventListener("click", function() {
            val = "Accepted";
            setCookie("wp_gdpr_permission", val, 30);
        })

    }

    for(var i = 0; i < gdprDecBtn.length; i++) {

        gdprDecBtn[i].addEventListener("click", function() {
            val = "Declined";
            setCookie("wp_gdpr_permission", val, 30);
        })

    }
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
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

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


for( var i = 0; i < gdprDecBtn.length; i++ ) {
    gdprDecBtn[i].addEventListener('click', function(){
        if( banner_top ) {
            banner_top.remove();
        }
        else if( banner_bottom ) {
            banner_bottom.remove();
        }
        else if( banner_right ) {
            banner_right.remove();
        }
        else if( banner_left ) {
            banner_left.remove();
        }
    });
};


for( var i = 0; i < gdprAcptBtn.length; i++ ) {
    gdprAcptBtn[i].addEventListener('click', function(){
        if( banner_top ) {
            banner_top.remove();
        }
        else if( banner_bottom ) {
            banner_bottom.remove();
        }
        else if( banner_right ) {
            banner_right.remove();
        }
        else if( banner_left ) {
            banner_left.remove();
        }
    });
};

