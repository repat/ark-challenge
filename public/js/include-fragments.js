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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@github/include-fragment-element/dist/index.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@github/include-fragment-element/dist/index.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return IncludeFragmentElement; });
const privateData = new WeakMap();
function fire(name, target) {
    setTimeout(function () {
        target.dispatchEvent(new Event(name));
    }, 0);
}
async function handleData(el) {
    return getData(el).then(function (html) {
        const template = document.createElement('template');
        template.innerHTML = html;
        const fragment = document.importNode(template.content, true);
        const canceled = !el.dispatchEvent(new CustomEvent('include-fragment-replace', { cancelable: true, detail: { fragment } }));
        if (canceled)
            return;
        el.replaceWith(fragment);
        el.dispatchEvent(new CustomEvent('include-fragment-replaced'));
    }, function () {
        el.classList.add('is-error');
    });
}
function getData(el) {
    const src = el.src;
    let data = privateData.get(el);
    if (data && data.src === src) {
        return data.data;
    }
    else {
        if (src) {
            data = el.load();
        }
        else {
            data = Promise.reject(new Error('missing src'));
        }
        privateData.set(el, { src, data });
        return data;
    }
}
function isWildcard(accept) {
    return accept && !!accept.split(',').find(x => x.match(/^\s*\*\/\*/));
}
class IncludeFragmentElement extends HTMLElement {
    constructor() {
        super();
        this._attached = false;
    }
    static get observedAttributes() {
        return ['src'];
    }
    get src() {
        const src = this.getAttribute('src');
        if (src) {
            const link = this.ownerDocument.createElement('a');
            link.href = src;
            return link.href;
        }
        else {
            return '';
        }
    }
    set src(val) {
        this.setAttribute('src', val);
    }
    get accept() {
        return this.getAttribute('accept') || '';
    }
    set accept(val) {
        this.setAttribute('accept', val);
    }
    get data() {
        return getData(this);
    }
    attributeChangedCallback(attribute) {
        if (attribute === 'src') {
            if (this._attached) {
                handleData(this);
            }
        }
    }
    connectedCallback() {
        this._attached = true;
        if (this.src) {
            handleData(this);
        }
    }
    disconnectedCallback() {
        this._attached = false;
    }
    request() {
        const src = this.src;
        if (!src) {
            throw new Error('missing src');
        }
        return new Request(src, {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
                Accept: this.accept || 'text/html'
            }
        });
    }
    load() {
        return Promise.resolve()
            .then(() => {
            fire('loadstart', this);
            return this.fetch(this.request());
        })
            .then(response => {
            if (response.status !== 200) {
                throw new Error(`Failed to load resource: the server responded with a status of ${response.status}`);
            }
            const ct = response.headers.get('Content-Type');
            if (!isWildcard(this.accept) && (!ct || !ct.includes(this.accept ? this.accept : 'text/html'))) {
                throw new Error(`Failed to load resource: expected ${this.accept || 'text/html'} but was ${ct}`);
            }
            return response;
        })
            .then(response => response.text())
            .then(data => {
            fire('load', this);
            fire('loadend', this);
            return data;
        }, error => {
            fire('error', this);
            fire('loadend', this);
            throw error;
        });
    }
    fetch(request) {
        return fetch(request);
    }
}
if (!window.customElements.get('include-fragment')) {
    window.IncludeFragmentElement = IncludeFragmentElement;
    window.customElements.define('include-fragment', IncludeFragmentElement);
}


/***/ }),

/***/ 1:
/*!***************************************************************************!*\
  !*** multi ./node_modules/@github/include-fragment-element/dist/index.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/rene/Documents/GitHub/ark-challenge/node_modules/@github/include-fragment-element/dist/index.js */"./node_modules/@github/include-fragment-element/dist/index.js");


/***/ })

/******/ });