/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/general/index.js":
/*!**************************************!*\
  !*** ./src/scripts/general/index.js ***!
  \**************************************/
/***/ (() => {

eval("// Get all the elements you want to show on scroll\nconst targets = document.querySelectorAll(\".js-show-on-scroll\");\n\n// Callback for IntersectionObserver\nconst callback = function(entries) {\n    entries.forEach(entry => {\n        const animationType = entry.target.dataset.animateType;\n        if (entry.isIntersecting) {\n        //   entry.target.classList.add(animationType);\n      }\n    });\n  };\n\n// Set up a new observer\nconst observer = new IntersectionObserver(callback);\n\n// Loop through each of the target\ntargets.forEach(function(target) {\n  // Hide the element\n//   target.classList.add(\"opacity-0\");\n\n  // Add the element to the watcher\n  observer.observe(target);\n});\n\n//# sourceURL=webpack://projectname/./src/scripts/general/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scripts/general/index.js"]();
/******/ 	
/******/ })()
;