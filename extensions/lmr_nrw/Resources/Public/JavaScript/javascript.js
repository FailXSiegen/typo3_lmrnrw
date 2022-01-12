/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/javascript/index.js":
/*!*********************************!*\
  !*** ./src/javascript/index.js ***!
  \*********************************/
/***/ (function() {

eval("var collapseElements = document.querySelectorAll('.flex-collapse');\n\nfor (var i = 0, n = collapseElements.length; i < n; ++i) {\n  collapseElements[i].addEventListener('click', function (e) {\n    e.preventDefault();\n    var expanded = this.getAttribute('aria-expanded').toLowerCase() === 'true' ? true : false;\n    this.setAttribute('aria-expanded', !expanded);\n  });\n}\n\nvar toggleMobileNav = document.querySelectorAll('.toggle-mobile-nav');\nvar headerNavigation = document.getElementById('mobile-head');\n\nfor (var i = 0, n = toggleMobileNav.length; i < n; ++i) {\n  toggleMobileNav[i].addEventListener('click', function (e) {\n    e.preventDefault();\n    var expanded = headerNavigation.getAttribute('aria-expanded').toLowerCase() === 'true' ? true : false;\n    headerNavigation.setAttribute('aria-expanded', !expanded);\n  });\n}\n\n//# sourceURL=webpack:///./src/javascript/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/javascript/index.js"]();
/******/ 	
/******/ })()
;