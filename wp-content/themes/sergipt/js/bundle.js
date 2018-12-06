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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/general-scripts.js":
/*!**************************************!*\
  !*** ./assets/js/general-scripts.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\n$(document).ready(function () {\n  $('a[href=\"#\"]').click(function (event) {\n    event.preventDefault();\n  });\n  /*TOOLTIP*/\n\n  $('[data-toggle=\"tooltip\"]').tooltip();\n  /*BACK TO TOP*/\n\n  $('.back-to-top').click(function () {\n    $('html, body').animate({\n      scrollTop: 0\n    }, 800);\n    return false;\n  });\n  /*MENU*/\n\n  function toggle_menu() {\n    console.log('toggle_menu');\n    $('.nav-button').toggleClass('-close');\n    $('.nav-button').toggleClass('-open');\n\n    if ($('body').hasClass('open-menu')) {\n      $('body').addClass('closing-menu');\n      $('body').removeClass('open-menu');\n      setTimeout(function () {\n        $('body').removeClass('closing-menu');\n      }, 700);\n    } else {\n      $('body').addClass('open-menu');\n    }\n  }\n\n  $('.nav-button').click(function () {\n    toggle_menu();\n  });\n  $('.open-menu .main-menu a').click(function () {\n    toggle_menu();\n  });\n  /*ANIMATE START*/\n\n  $('[class*=\"animate_\"]').each(function () {\n    $(this).addClass('animate_start');\n  });\n});\n$(window).load(function () {\n  /*$('body').addClass('white_menu');\n  var element = $('.waypoint_header');\n  var header_pos = $('header').outerHeight()/2;\n  var waypoint_header = new Waypoint({\n  \telement: element,\n  \toffset: header_pos,\n  \thandler : function( direction ) {\n  \t\tif ( direction === 'down' ) { \n  \t\t\t$('body').addClass('white_menu')\n  \t\t} else {\t\t\t\t\t\n  \t\t\t$('body').removeClass('white_menu')\n  \t\t}\n  \t}\n  });\t*/\n  var element = $('body');\n  var header_pos = -200;\n  var waypoint_header = new Waypoint({\n    element: element,\n    offset: header_pos,\n    handler: function handler(direction) {\n      if (direction === 'down') {\n        $('body:not(.always_sticky)').addClass('sticky_header');\n      } else {\n        $('body:not(.always_sticky)').removeClass('sticky_header');\n      }\n    }\n  });\n});\n$(window).resize(function () {});\n$(window).scroll(function () {});\n/*$(window).on(\"orientationchange\",function(){\n\tlocation.reload();\n});*/\n\n//# sourceURL=webpack:///./assets/js/general-scripts.js?");

/***/ }),

/***/ "./assets/scss/main.scss":
/*!*******************************!*\
  !*** ./assets/scss/main.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./assets/scss/main.scss?");

/***/ }),

/***/ 0:
/*!********************************************************************!*\
  !*** multi ./assets/js/general-scripts.js ./assets/scss/main.scss ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./assets/js/general-scripts.js */\"./assets/js/general-scripts.js\");\nmodule.exports = __webpack_require__(/*! ./assets/scss/main.scss */\"./assets/scss/main.scss\");\n\n\n//# sourceURL=webpack:///multi_./assets/js/general-scripts.js_./assets/scss/main.scss?");

/***/ })

/******/ });