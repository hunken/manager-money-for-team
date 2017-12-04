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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 33);
/******/ })
/************************************************************************/
/******/ ({

/***/ 33:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(34);


/***/ }),

/***/ 34:
/***/ (function(module, exports) {

//Vue.component('input_title', require('../components/backend/post/input_title.vue'));
var posts = new Vue({
    el: ".form-add-post",
    data: {}
});
$(".tags input").tagsInput({ width: "auto" }); // Post

var jBox_Manager = new jBox('Modal', {
    attach: '.open-media-manager',
    width: 1120,
    height: 500,
    closeButton: 'title',
    animation: false,
    title: 'AJAX request',
    ajax: {
        url: "/dashboard/ajax/media/browser",
        reload: 'strict',
        setContent: false,
        beforeSend: function beforeSend() {

            this.setContent('');
            this.setTitle('<div class="ajax-sending">Request media manager</div>');
        },
        complete: function complete(response) {
            this.setTitle('<div class="ajax-complete">Media manager</div>');
        },
        success: function success(response) {
            this.setContent('<div class="media-manager">' + response + '</tt></div>');
        },
        error: function error() {
            this.setContent('<div class="ajax-error">Oops, something went wrong</div>');
        }
    }
});
$(document).on("click", ".open-media-manager", function () {
    jBox_Manager.open();
});

/**
 * Add media to TinyMCE
 *
 */
$(document).on("click", "#add-media", function (e) {
    e.preventDefault();
    add_media_to_postmce();
    jBox_Manager.close();
    return;
});

/***/ })

/******/ });