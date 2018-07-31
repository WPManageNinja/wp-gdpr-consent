/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 217);
/******/ })
/************************************************************************/
/******/ ({

/***/ 217:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(218);


/***/ }),

/***/ 218:
/***/ (function(module, exports) {

var gdprDecBtn = document.getElementsByClassName('gdprDecBtn');
var gdprAcptBtn = document.getElementsByClassName('gdprAcptBtn');

var banner_top = document.getElementById('wpgdpr_banner_top');
var banner_bottom = document.getElementById('wpgdpr_banner_bottom');
var banner_right = document.getElementById('wpgdpr_banner_right');
var banner_left = document.getElementById('wpgdpr_banner_left');

var permission = getCookie("wp_gdpr_permission");

var delay = gpd_settings_vars.delay * 1000;
var duration = gpd_settings_vars.duration;

if (permission != "") {

    if (banner_top) {
        banner_top.remove();
    } else if (banner_bottom) {
        banner_bottom.remove();
    } else if (banner_right) {
        banner_right.remove();
    } else if (banner_left) {
        banner_left.remove();
    }
} else {

    for (var i = 0; i < gdprAcptBtn.length; i++) {

        gdprAcptBtn[i].addEventListener("click", function () {
            val = "accepted";
            setCookie("wp_gdpr_permission", val, duration);
        });
    }

    for (var i = 0; i < gdprDecBtn.length; i++) {

        gdprDecBtn[i].addEventListener("click", function () {
            val = "declined";
            setCookie("wp_gdpr_permission", val, duration);
        });
    }
}

function getCookie(cname) {
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

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

for (var i = 0; i < gdprDecBtn.length; i++) {
    gdprDecBtn[i].addEventListener('click', function () {
        if (banner_top) {
            banner_top.remove();
        } else if (banner_bottom) {
            banner_bottom.remove();
        } else if (banner_right) {
            banner_right.remove();
        } else if (banner_left) {
            banner_left.remove();
        }
    });
};

for (var i = 0; i < gdprAcptBtn.length; i++) {
    gdprAcptBtn[i].addEventListener('click', function () {
        if (banner_top) {
            banner_top.remove();
        } else if (banner_bottom) {
            banner_bottom.remove();
        } else if (banner_right) {
            banner_right.remove();
        } else if (banner_left) {
            banner_left.remove();
        }
    });
};

setTimeout(function () {
    if (banner_top) {
        banner_top.remove();
    } else if (banner_bottom) {
        banner_bottom.remove();
    } else if (banner_right) {
        banner_right.remove();
    } else if (banner_left) {
        banner_left.remove();
    }
}, delay);

/***/ })

/******/ });