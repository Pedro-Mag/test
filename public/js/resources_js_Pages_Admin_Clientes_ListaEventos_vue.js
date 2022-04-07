"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Clientes_ListaEventos_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      filter: "",
      fields: [{
        key: "event",
        label: "Evento",
        sortable: true,
        "class": "align-middle"
      }, {
        key: "date",
        label: "Data",
        sortable: true,
        "class": "align-middle"
      }, {
        key: "user_name",
        label: "Responsável"
      }],
      perPage: 10,
      currentPage: 1
    };
  },
  computed: {
    rows: function rows() {
      return this.events.length;
    }
  },
  props: {
    events: Array
  }
});

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/ListaEventos.vue":
/*!************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/ListaEventos.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListaEventos.vue?vue&type=template&id=2efa4d90& */ "./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90&");
/* harmony import */ var _ListaEventos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListaEventos.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ListaEventos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__.render,
  _ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Clientes/ListaEventos.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListaEventos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ListaEventos.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListaEventos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListaEventos_vue_vue_type_template_id_2efa4d90___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ListaEventos.vue?vue&type=template&id=2efa4d90& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/ListaEventos.vue?vue&type=template&id=2efa4d90& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "b-row",
        { staticClass: "d-flex align-items-center mb-2" },
        [
          _c("b-col", [
            _c("label", [_vm._v("Eventos associados ao cliente:")]),
          ]),
          _vm._v(" "),
          _c("b-col", { attrs: { md: "auto" } }, [
            _c("div", { staticClass: "input-group mb-3 w-100" }, [
              _c("div", { staticClass: "input-group-prepend" }, [
                _c("span", { staticClass: "input-group-text mdi mdi-magnify" }),
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.filter,
                    expression: "filter",
                  },
                ],
                staticClass: "form-control",
                attrs: { type: "text", placeholder: "Procurar..." },
                domProps: { value: _vm.filter },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.filter = $event.target.value
                  },
                },
              }),
            ]),
          ]),
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        [
          _c("b-table", {
            attrs: {
              id: "events-table",
              hover: "",
              small: "",
              responsive: "",
              "show-empty": "",
              items: _vm.events,
              fields: _vm.fields,
              filter: _vm.filter,
              "per-page": _vm.perPage,
              "current-page": _vm.currentPage,
              "sort-by": "date",
              "sort-desc": "true",
            },
            scopedSlots: _vm._u([
              {
                key: "cell(user_name)",
                fn: function (data) {
                  return [
                    _c("b-avatar", {
                      staticClass: "mr-2",
                      attrs: { src: data.item.userThumb, size: "sm" },
                    }),
                    _vm._v(" "),
                    _c("span", [_vm._v(_vm._s(data.item.userName))]),
                  ]
                },
              },
              {
                key: "empty",
                fn: function (scope) {
                  return [_c("small", [_vm._v(" Nenhum evento registado... ")])]
                },
              },
            ]),
          }),
          _vm._v(" "),
          _vm.perPage / _vm.rows < 1
            ? _c("b-pagination", {
                attrs: {
                  "total-rows": _vm.rows,
                  "per-page": _vm.perPage,
                  "aria-controls": "events-table",
                  align: "right",
                },
                model: {
                  value: _vm.currentPage,
                  callback: function ($$v) {
                    _vm.currentPage = $$v
                  },
                  expression: "currentPage",
                },
              })
            : _vm._e(),
        ],
        1
      ),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);