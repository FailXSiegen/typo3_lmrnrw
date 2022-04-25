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

/***/ "./src/javascript/purecounter_vanilla.js":
/*!***********************************************!*\
  !*** ./src/javascript/purecounter_vanilla.js ***!
  \***********************************************/
/***/ (function() {

eval("/** Initial function */\nfunction registerEventListeners() {\n  /** Get all elements with class 'purecounter' */\n  var elements = document.querySelectorAll('.purecounter');\n  /** Get browser Intersection Listener Support */\n\n  var intersectionSupported = intersectionListenerSupported();\n  /** Run animateElements base on Intersection Support */\n\n  if (intersectionSupported) {\n    var intersectObserver = new IntersectionObserver(animateElements, {\n      \"root\": null,\n      \"rootMargin\": '20px',\n      \"threshold\": 0.5\n    });\n    elements.forEach(function (element) {\n      intersectObserver.observe(element);\n    });\n  } else {\n    if (window.addEventListener) {\n      animateLegacy(elements);\n      window.addEventListener('scroll', function (e) {\n        animateLegacy(elements);\n      }, {\n        \"passive\": true\n      });\n    }\n  }\n}\n/** This legacy to make Purecounter use very lightweight & fast */\n\n\nfunction animateLegacy(elements) {\n  elements.forEach(function (element) {\n    var config = parseConfig(element);\n\n    if (config.legacy === true && elementIsInView(element)) {\n      animateElements([element]);\n    }\n  });\n}\n/** Main Element Count Animation */\n\n\nfunction animateElements(elements, observer) {\n  elements.forEach(function (element) {\n    var elm = element.target || element; // Just make sure which element will be used\n\n    var elementConfig = parseConfig(elm); // Get config value on that element\n    // If duration is less than or equal zero, just format the 'end' value\n\n    if (elementConfig.duration <= 0) {\n      return elm.innerHTML = formatNumber(elementConfig.end, elementConfig);\n    }\n\n    if (!observer && !elementIsInView(element) || observer && element.intersectionRatio < 0.5) {\n      var value = elementConfig.start > elementConfig.end ? elementConfig.end : elementConfig.start;\n      return elm.innerHTML = formatNumber(value, elementConfig);\n    } // If duration is more than 0, then start the counter\n\n\n    setTimeout(function () {\n      return startCounter(elm, elementConfig);\n    }, elementConfig.delay);\n  });\n}\n/** This is the the counter method */\n\n\nfunction startCounter(element, config) {\n  // First, get the increments step\n  var incrementsPerStep = (config.end - config.start) / (config.duration / config.delay); // Next, set the counter mode (Increment or Decrement)\n\n  var countMode = 'inc'; // Set mode to 'decrement' and 'increment step' to minus if start is larger than end\n\n  if (config.start > config.end) {\n    countMode = 'dec';\n    incrementsPerStep *= -1;\n  } // Next, determine the starting value\n\n\n  var currentCount = parseValue(config.start); // And then print it's value to the page\n\n  element.innerHTML = formatNumber(currentCount, config); // If the config 'once' is true, then set the 'duration' to 0\n\n  if (config.once === true) {\n    element.setAttribute('data-purecounter-duration', 0);\n  } // Now, start counting with counterWorker using Interval method based on delay\n\n\n  var counterWorker = setInterval(function () {\n    // First, determine the next value base on current value, increment value, and count mode\n    var nextNum = nextNumber(currentCount, incrementsPerStep, countMode); // Next, print that value to the page\n\n    element.innerHTML = formatNumber(nextNum, config); // Now set that value to the current value, because it's already printed\n\n    currentCount = nextNum; // If the value is larger or less than the 'end' (base on mode), then  print the end value and stop the Interval\n\n    if (currentCount >= config.end && countMode == 'inc' || currentCount <= config.end && countMode == 'dec') {\n      element.innerHTML = formatNumber(config.end, config);\n      clearInterval(counterWorker);\n    }\n  }, config.delay);\n}\n/** This function is to generate the element Config */\n\n\nfunction parseConfig(element) {\n  // First, we need to declare the base Config\n  // This config will be used if the element doesn't have config\n  var baseConfig = {\n    start: 0,\n    end: 9001,\n    duration: 2000,\n    delay: 10,\n    once: true,\n    decimals: 0,\n    decimalseparatorsymbol: ',',\n    legacy: true,\n    currency: false,\n    currencysymbol: false,\n    separator: false,\n    separatorsymbol: ','\n  }; // Next, get all 'data-precounter' attributes value. Store to array\n\n  var configValues = [].filter.call(element.attributes, function (attr) {\n    return /^data-purecounter-/.test(attr.name);\n  }); // Now, we create element config as an empty object\n\n  var elementConfig = {}; // And then, fill the element config based on config values\n\n  configValues.forEach(function (e) {\n    var name = e.name.replace('data-purecounter-', '').toLowerCase();\n    var value = name == 'duration' ? parseInt(parseValue(e.value) * 1000) : parseValue(e.value);\n    elementConfig[name] = value; // We will get an object\n  }); // Last marge base config with element config and return it as an object\n\n  return Object.assign(baseConfig, elementConfig);\n}\n/** This function is to get the next number */\n\n\nfunction nextNumber(number, steps) {\n  var mode = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'inc';\n  // First, get the exact value from the number and step (int or float)\n  number = parseValue(number);\n  steps = parseValue(steps); // Last, get the next number based on current number, increment step, and count mode\n  // Always return it as float\n\n  return parseFloat(mode === 'inc' ? number + steps : number - steps);\n}\n/** This function is to convert number into currency format */\n\n\nfunction convertToCurrencySystem(number, config) {\n  var symbol = config.currencysymbol || \"\",\n      // Set the Currency Symbol (if any)\n  limit = config.decimals || 1,\n      // Set the decimal limit (default is 1)\n  number = Math.abs(Number(number)); // Get the absolute value of number\n  // Set the value\n\n  var value = number >= 1.0e+12 ? \"\".concat((number / 1.0e+12).toFixed(limit), \" T\") // Twelve zeros for Trillions\n  : number >= 1.0e+9 ? \"\".concat((number / 1.0e+9).toFixed(limit), \" B\") // Nine zeros for Billions\n  : number >= 1.0e+6 ? \"\".concat((number / 1.0e+6).toFixed(limit), \" M\") // Six zeros for Millions\n  : number >= 1.0e+3 ? \"\".concat((number / 1.0e+12).toFixed(limit), \" K\") // Three zeros for Thousands\n  : number.toFixed(limit); // If less than 1000, print it's value\n  // Apply symbol before the value and return it as string\n\n  return symbol + value;\n}\n/** This function is to get the last formated number */\n\n\nfunction applySeparator(value, config) {\n  // If config separator is false, delete all separator\n  if (!config.separator) {\n    return value.replace(new RegExp(/,/gi, 'gi'), '').replace(new RegExp(/\\./gi, 'gi'), '');\n  } // If config separator is true, then create separator\n\n\n  return value.replace(new RegExp(/,/gi, 'gi'), config.decimalseparatorsymbol).replace(new RegExp(/\\./gi, 'gi'), config.separatorsymbol);\n}\n/** This function is to get formated number to be printed in the page */\n\n\nfunction formatNumber(number, config) {\n  // This is the configuration for 'toLocaleString' method\n  var strConfig = {\n    minimumFractionDigits: config.decimals,\n    maximumFractionDigits: config.decimals\n  }; // Set the number if it using currency, then convert. If doesn't, just parse it as float\n\n  number = config.currency ? convertToCurrencySystem(number, config) : parseFloat(number); // Last, apply the number separator using number as string\n\n  return applySeparator(number.toLocaleString(undefined, strConfig), config);\n}\n/** This function is to get the parsed value */\n\n\nfunction parseValue(data) {\n  // If number with dot (.), will be parsed as float\n  if (/^[0-9]+\\.[0-9]+$/.test(data)) {\n    return parseFloat(data);\n  } // If just number, will be parsed as integer\n\n\n  if (/^[0-9]+$/.test(data)) {\n    return parseInt(data);\n  } // If it's boolean string, will be parsed as boolean\n\n\n  if (/^true|false/i.test(data)) {\n    return /^true/i.test(data);\n  } // Return it's value as default\n\n\n  return data;\n} // This function is to detect the element is in view or not.\n\n\nfunction elementIsInView(element) {\n  var top = element.offsetTop;\n  var left = element.offsetLeft;\n  var width = element.offsetWidth;\n  var height = element.offsetHeight;\n\n  while (element.offsetParent) {\n    element = element.offsetParent;\n    top += element.offsetTop;\n    left += element.offsetLeft;\n  }\n\n  return top >= window.pageYOffset && left >= window.pageXOffset && top + height <= window.pageYOffset + window.innerHeight && left + width <= window.pageXOffset + window.innerWidth;\n}\n/** Just some condition to check browser Intersection Support */\n\n\nfunction intersectionListenerSupported() {\n  return 'IntersectionObserver' in window && 'IntersectionObserverEntry' in window && 'intersectionRatio' in window.IntersectionObserverEntry.prototype;\n}\n/** Run the initial function */\n\n\n(function () {\n  registerEventListeners();\n})();\n\n//# sourceURL=webpack:///./src/javascript/purecounter_vanilla.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/javascript/purecounter_vanilla.js"]();
/******/ 	
/******/ })()
;