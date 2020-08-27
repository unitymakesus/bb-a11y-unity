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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/unity-jump-link.js":
/*!***********************************************!*\
  !*** ./assets/src/scripts/unity-jump-link.js ***!
  \***********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _util_prefersReducedMotion__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./util/prefersReducedMotion */ "./assets/src/scripts/util/prefersReducedMotion.js");



if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

var jumpLinks = document.querySelectorAll('.unity-jump-link__btn');
jumpLinks.forEach(function (elem) {
  var clone = elem.cloneNode(true);
  elem.after(clone);
  elem.remove();
});
var newJumpLinks = document.querySelectorAll('.unity-jump-link__btn');
newJumpLinks.forEach(function (elem) {
  elem.addEventListener('click', function (event) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this.hash);
      target = target.length ? target : jquery__WEBPACK_IMPORTED_MODULE_0___default()('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        var speed = Object(_util_prefersReducedMotion__WEBPACK_IMPORTED_MODULE_1__["default"])() ? 0 : 1000;
        jquery__WEBPACK_IMPORTED_MODULE_0___default()('html, body').animate({
          scrollTop: target.offset().top
        }, speed, function () {
          // Callback after animation
          // Must change focus!
          var $target = jquery__WEBPACK_IMPORTED_MODULE_0___default()(target);
          $target.focus();

          if ($target.is(':focus')) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }
        });
      }
    }
  });
});

/***/ }),

/***/ "./assets/src/scripts/util/prefersReducedMotion.js":
/*!*********************************************************!*\
  !*** ./assets/src/scripts/util/prefersReducedMotion.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * Check user settings for reduced motion preferences, if available.
 */
var prefersReducedMotion = function prefersReducedMotion() {
  return window.matchMedia('(prefers-reduced-motion)').matches ? true : false;
};

/* harmony default export */ __webpack_exports__["default"] = (prefersReducedMotion);

/***/ }),

/***/ "./assets/src/styles/unity-modaal-gallery.scss":
/*!*****************************************************!*\
  !*** ./assets/src/styles/unity-modaal-gallery.scss ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/src/styles/unity-modaal.scss":
/*!*********************************************!*\
  !*** ./assets/src/styles/unity-modaal.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************************************************************!*\
  !*** multi ./assets/src/scripts/unity-jump-link.js ./assets/src/styles/unity-modaal.scss ./assets/src/styles/unity-modaal-gallery.scss ***!
  \*****************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/andrewmarino/Local/simple/app/public/wp-content/plugins/unity-accessible-bb-modules/assets/src/scripts/unity-jump-link.js */"./assets/src/scripts/unity-jump-link.js");
__webpack_require__(/*! /Users/andrewmarino/Local/simple/app/public/wp-content/plugins/unity-accessible-bb-modules/assets/src/styles/unity-modaal.scss */"./assets/src/styles/unity-modaal.scss");
module.exports = __webpack_require__(/*! /Users/andrewmarino/Local/simple/app/public/wp-content/plugins/unity-accessible-bb-modules/assets/src/styles/unity-modaal-gallery.scss */"./assets/src/styles/unity-modaal-gallery.scss");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });