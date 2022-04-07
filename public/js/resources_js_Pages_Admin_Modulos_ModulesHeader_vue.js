"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Modulos_ModulesHeader_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js& ***!
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
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      openStatus: false
    };
  },
  props: {
    module: Object,
    baseDiv: String,
    filter: String,
    can: Object
  },
  computed: {
    filtered: function filtered() {
      if (this.filter && this.filter.length > 2) {
        var trasformFilter = this.filter.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
        return this.module.text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().includes(trasformFilter) || this.module.name.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().includes(trasformFilter) || this.module.url && this.module.url.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().includes(trasformFilter);
      }

      return false;
    }
  },
  watch: {
    filtered: function filtered() {
      if (this.filtered) this.$emit("open-parent");
    }
  },
  methods: {
    toggleOpenStatus: function toggleOpenStatus() {
      this.openStatus = !this.openStatus;
    },
    addModule: function addModule(id) {
      this.$emit("action-in-module", {
        action: "add",
        id: id
      });
    },
    showModule: function showModule(id) {
      this.$emit("action-in-module", {
        action: "show",
        id: id
      });
    },
    editModule: function editModule(id) {
      this.$emit("action-in-module", {
        action: "edit",
        id: id
      });
    },
    destroyModule: function destroyModule(id) {
      this.$emit("action-in-module", {
        action: "destroy",
        id: id
      });
    },
    moveModule: function moveModule(id, direction) {
      this.$emit("action-in-module", {
        action: "move",
        id: id,
        direction: direction
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#modulesCard .card:not(:last-of-type) {\n    border-bottom: 1px solid #fff !important;\n}\n#modulesCard .headerPointer {\n    cursor: pointer;\n}\n#modulesCard .buttonGroup {\n    display: none;\n}\n#modulesCard .card-header {\n    min-height: 60px !important;\n}\n#modulesCard .card-header.filtered {\n    background-color: #4a8d5b !important;\n}\n#modulesCard .card-header:hover {\n    background-color: #6c757d !important;\n}\n#modulesCard .card-header:hover > .buttonGroup {\n    display: flex;\n}\n#modulesCard #moveUpDown button {\n    height: 16px !important;\n    font-size: 10px;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ModulesHeader.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue":
/*!************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/ModulesHeader.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ModulesHeader.vue?vue&type=template&id=da1a43ee& */ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee&");
/* harmony import */ var _ModulesHeader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ModulesHeader.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js&");
/* harmony import */ var _ModulesHeader_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ModulesHeader.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ModulesHeader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__.render,
  _ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Modulos/ModulesHeader.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ModulesHeader.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ModulesHeader.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ModulesHeader_vue_vue_type_template_id_da1a43ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ModulesHeader.vue?vue&type=template&id=da1a43ee& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/ModulesHeader.vue?vue&type=template&id=da1a43ee& ***!
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
    {
      staticClass:
        "card-header bg-dark text-white d-flex flex-wrap align-items-center px-1 px-md-3",
      class: {
        headerPointer: _vm.module.child_modules.length,
        filtered: _vm.filtered,
      },
    },
    [
      _c(
        "div",
        { staticClass: "mr-0 mr-md-2" },
        [
          _vm.module.child_modules.length
            ? _c("Icon", {
                attrs: {
                  mdi: _vm.openStatus ? "menu-down" : "menu-right",
                  size: "md",
                },
              })
            : _c("div", { staticStyle: { width: "24px" } }),
        ],
        1
      ),
      _vm._v(" "),
      !_vm.module.child_modules.length
        ? _c(
            "div",
            {
              staticClass:
                "flex-grow-1 flex-shrink-0 d-flex align-items-center",
            },
            [
              _vm.module.icon
                ? _c("Icon", {
                    staticClass: "pr-1 pr-md-2",
                    attrs: { mdi: _vm.module.icon, size: "md" },
                  })
                : _vm._e(),
              _vm._v("\n        " + _vm._s(_vm.module.text) + "\n    "),
            ],
            1
          )
        : _c(
            "a",
            {
              directives: [
                {
                  name: "b-toggle",
                  rawName: "v-b-toggle",
                  value: _vm.baseDiv,
                  expression: "baseDiv",
                },
              ],
              staticClass:
                "d-flex flex-grow-1 flex-shrink-0 align-items-center text-reset text-decoration-none",
              attrs: { "data-toggle": "collapse" },
              on: {
                click: function ($event) {
                  return _vm.toggleOpenStatus()
                },
              },
            },
            [
              _vm.module.icon
                ? _c("Icon", {
                    staticClass: "pr-1",
                    attrs: { mdi: _vm.module.icon, size: "md" },
                  })
                : _vm._e(),
              _vm._v("\n        " + _vm._s(_vm.module.text) + "\n    "),
            ],
            1
          ),
      _vm._v(" "),
      this.can.edit
        ? _c(
            "div",
            { staticClass: "align-items-center flex-shrink-0 buttonGroup" },
            [
              _c("b-button-group", { staticClass: "mr-2" }, [
                _c(
                  "button",
                  {
                    directives: [
                      {
                        name: "b-tooltip",
                        rawName: "v-b-tooltip.hover",
                        modifiers: { hover: true },
                      },
                    ],
                    staticClass:
                      "btn btn-outline-light btn-sm module-create-btn",
                    attrs: { type: "button", title: "Adicionar módulo filho" },
                    on: {
                      click: function ($event) {
                        return _vm.addModule(_vm.module.id)
                      },
                    },
                  },
                  [_c("Icon", { attrs: { mdi: "plus" } })],
                  1
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    directives: [
                      {
                        name: "b-tooltip",
                        rawName: "v-b-tooltip.hover",
                        modifiers: { hover: true },
                      },
                    ],
                    staticClass: "btn btn-outline-light btn-sm module-edit-btn",
                    attrs: { type: "button", title: "Editar módulo" },
                    on: {
                      click: function ($event) {
                        return _vm.editModule(_vm.module.id)
                      },
                    },
                  },
                  [_c("Icon", { attrs: { mdi: "pencil" } })],
                  1
                ),
                _vm._v(" "),
                _c(
                  "button",
                  {
                    directives: [
                      {
                        name: "b-tooltip",
                        rawName: "v-b-tooltip.hover",
                        modifiers: { hover: true },
                      },
                    ],
                    staticClass:
                      "btn btn-outline-light btn-sm module-delete-btn",
                    attrs: { type: "button", title: "Eliminar módulo" },
                    on: {
                      click: function ($event) {
                        return _vm.destroyModule(_vm.module.id)
                      },
                    },
                  },
                  [_c("Icon", { attrs: { mdi: "delete" } })],
                  1
                ),
              ]),
              _vm._v(" "),
              _c(
                "b-button-group",
                { attrs: { vertical: "", id: "moveUpDown" } },
                [
                  _c(
                    "button",
                    {
                      directives: [
                        {
                          name: "b-tooltip",
                          rawName: "v-b-tooltip.hover",
                          modifiers: { hover: true },
                        },
                      ],
                      staticClass:
                        "btn btn-sm btn-outline-light py-0 border-bottom-0",
                      attrs: { type: "button", title: "Mover módulo acima" },
                      on: {
                        click: function ($event) {
                          return _vm.moveModule(_vm.module.id, -1)
                        },
                      },
                    },
                    [_c("span", { staticClass: "mdi mdi-arrow-up" })]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      directives: [
                        {
                          name: "b-tooltip",
                          rawName: "v-b-tooltip.hover",
                          modifiers: { hover: true },
                        },
                      ],
                      staticClass:
                        "btn btn-sm btn-outline-light py-0 border-top-0",
                      attrs: { type: "button", title: "Mover módulo abaixo" },
                      on: {
                        click: function ($event) {
                          return _vm.moveModule(_vm.module.id, 1)
                        },
                      },
                    },
                    [_c("span", { staticClass: "mdi mdi-arrow-down" })]
                  ),
                ]
              ),
            ],
            1
          )
        : _c("div", [
            _c(
              "button",
              {
                directives: [
                  {
                    name: "b-tooltip",
                    rawName: "v-b-tooltip.hover",
                    modifiers: { hover: true },
                  },
                ],
                staticClass: "btn btn-outline-light btn-sm module-create-btn",
                attrs: { type: "button", title: "Ver detalhes do módulo" },
                on: {
                  click: function ($event) {
                    return _vm.showModule(_vm.module.id)
                  },
                },
              },
              [_c("Icon", { attrs: { mdi: "eye" } })],
              1
            ),
          ]),
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);