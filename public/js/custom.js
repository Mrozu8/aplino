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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/custom.js":
/***/ (function(module, exports) {

$('.ui.dropdown').dropdown();

$('.ui.slider.checkbox').checkbox();

$('.ui.checkbox.cv').checkbox();

$('.ui.radio.checkbox.cv').checkbox();

$('.ui.toggle.checkbox').checkbox();

$('.ui.accordion').accordion();

$('.business-card-modal').click(function () {
    $('.ui.basic.modal').modal('show');
});

// ============================ responsive ==================================================


$(document).ready(function () {
    var $rows = $("#alert.alert-error.custom, #alert.alert-success.custom");

    setTimeout(function () {
        $rows.addClass("invisible");
    }, 6000);
});

// left sidebar company

$("#left-hamburger").click(function () {
    $(".company-left-sidebar").toggle("slow", function () {
        // Animation complete.
    });
});

$("#left-hamburger-close").click(function () {
    $(".company-left-sidebar").toggle("slow", function () {
        // Animation complete.
    });
});

// toggle form inputs

var rotation = 0;
$("#primary-tools-toggle").click(function () {
    $("#primary-tools").toggle("slow", function () {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $(this).css({ '-webkit-transform': 'rotate(' + rotation + 'deg)',
        '-moz-transform': 'rotate(' + rotation + 'deg)',
        '-ms-transform': 'rotate(' + rotation + 'deg)',
        'transform': 'rotate(' + rotation + 'deg)' });
});

$("#text-tools-toggle").click(function () {
    $("#text-tools").toggle("slow", function () {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $(this).css({ '-webkit-transform': 'rotate(' + rotation + 'deg)',
        '-moz-transform': 'rotate(' + rotation + 'deg)',
        '-ms-transform': 'rotate(' + rotation + 'deg)',
        'transform': 'rotate(' + rotation + 'deg)' });
});

$("#textarea-tools-toggle").click(function () {
    $("#textarea-tools").toggle("slow", function () {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $(this).css({ '-webkit-transform': 'rotate(' + rotation + 'deg)',
        '-moz-transform': 'rotate(' + rotation + 'deg)',
        '-ms-transform': 'rotate(' + rotation + 'deg)',
        'transform': 'rotate(' + rotation + 'deg)' });
});

$("#radio-tools-toggle").click(function () {
    $(".radio-form-tools").toggle("slow", function () {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $(this).css({ '-webkit-transform': 'rotate(' + rotation + 'deg)',
        '-moz-transform': 'rotate(' + rotation + 'deg)',
        '-ms-transform': 'rotate(' + rotation + 'deg)',
        'transform': 'rotate(' + rotation + 'deg)' });
});

$("#checkbox-tools-toggle").click(function () {
    $(".checkbox-form-tools").toggle("slow", function () {
        // Animation complete.
    });

    rotation = rotation + 180;
    console.log(rotation);
    $(this).css({ '-webkit-transform': 'rotate(' + rotation + 'deg)',
        '-moz-transform': 'rotate(' + rotation + 'deg)',
        '-ms-transform': 'rotate(' + rotation + 'deg)',
        'transform': 'rotate(' + rotation + 'deg)' });
});

// Zapisywanie oraz podgląd formularza


$('#save-form').on('click', function () {
    $('#mine-form').submit();
});

// usuwanie z formularza głównych pól

$('[data-delete-button]').find('[data-id]').on('click', function (e) {

    // console.log(e.currentTarget.attributes['data-id'].value);

    var $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='mine_input' value='" + $input + "'>").submit();
});

// usuwanie z formularza radio

$('[data-delete-radio-button]').find('[data-id]').on('click', function (e) {

    var $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='radio' value='" + $input + "'>").submit();
});

// usuwanie z formularza głównych checkbox

$('[data-delete-checkbox-button]').find('[data-id]').on('click', function (e) {

    var $input = e.currentTarget.attributes['data-id'].value;

    $('#delete-custom').append("<input type='hidden' name='checkbox' value='" + $input + "'>").submit();
});

// dodawanie i usuwanie pól radio ===========================================================


document.querySelector('button.btn-radio-add').addEventListener('click', function () {

    var radio = document.createElement("input");
    radio.setAttribute('id', 'rad');
    radio.setAttribute('type', 'radio');
    // radio.setAttribute('name', 'fruit');
    radio.setAttribute('class', 'hidden');
    radio.setAttribute('tabindex', '0');

    var field = document.createElement("div");
    field.setAttribute('class', 'field radio');

    var fieldUi = document.createElement("div");
    fieldUi.setAttribute('class', 'ui radio checkbox');

    var lab = document.createElement('label');

    var text = document.createElement('input');
    text.setAttribute('type', 'text');
    text.setAttribute('name', 'radio[]');
    text.setAttribute('class', 'custom-input');

    var hook = document.querySelector('#radio-hook');
    var x = hook.appendChild(field).appendChild(fieldUi);

    x.appendChild(radio);
    x.appendChild(lab).appendChild(text);
});

document.querySelector('button.btn-radio-delete').addEventListener('click', function () {
    var radio = document.querySelector(".field.radio");
    radio.remove();
});

// dodawanie i usuwanie pól checkbox ================================================


document.querySelector('button.btn-checkbox-add').addEventListener('click', function () {

    var checkbox = document.createElement('input');

    // checkbox.setAttribute('name', 'fruit'); //nazwa do zmiany
    checkbox.setAttribute('class', 'hidden');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('tabindex', '0');

    var field = document.createElement('div');
    field.setAttribute('class', 'field checkbox');

    var fieldUi = document.createElement('div');
    fieldUi.setAttribute('class', 'ui checkbox');

    var lab = document.createElement('label');

    var input = document.createElement('input');

    input.setAttribute('name', 'checkbox[]');
    input.setAttribute('class', 'custom-input');
    input.setAttribute('type', 'text');

    var hook = document.querySelector('#checkbox-hook');
    var x = hook.appendChild(field).appendChild(fieldUi);

    x.appendChild(checkbox);
    x.appendChild(lab).appendChild(input);
});

document.querySelector('button.btn-checkbox-delete').addEventListener('click', function () {
    var checkbox = document.querySelector('.field.checkbox');
    checkbox.remove();
});

// Raring formularza

document.querySelector('input.range').addEventListener('input', function () {

    var r = this.value;

    var hook = document.getElementById('valBox');

    if (r == 1) {
        hook.style = 'color: #d03a3a';
    } else if (r == 2) {
        hook.style = 'color: #e44a4a';
    } else if (r == 3) {
        hook.style = 'color: #f75757';
    } else if (r == 4) {
        hook.style = 'color: #ff8383';
    } else if (r == 5) {
        hook.style = 'color: #ffb36f';
    } else if (r == 6) {
        hook.style = 'color: #ffda6f';
    } else if (r == 7) {
        hook.style = 'color: #ffe86f';
    } else if (r == 8) {
        hook.style = 'color: #a6cc39';
    } else if (r == 9) {
        hook.style = 'color: #64dc56';
    } else if (r == 10) {
        hook.style = 'color: #2ca547';
    }

    hook.innerHTML = r;
    // hook.appendChild('sdsd');
});

/***/ }),

/***/ "./resources/assets/sass/admin.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/company.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/custom.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/form.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/new_mini.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/custom.js");
__webpack_require__("./resources/assets/sass/custom.scss");
__webpack_require__("./resources/assets/sass/company.scss");
__webpack_require__("./resources/assets/sass/form.scss");
__webpack_require__("./resources/assets/sass/new_mini.scss");
module.exports = __webpack_require__("./resources/assets/sass/admin.scss");


/***/ })

/******/ });