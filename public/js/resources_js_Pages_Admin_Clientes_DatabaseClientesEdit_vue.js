"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Clientes_DatabaseClientesEdit_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      form: this.$inertia.form({
        table_id: this.table_id
      })
    };
  },
  props: {
    table_id: String,
    slug: String
  },
  watch: {
    table_id: function table_id() {
      this.form.table_id = this.table_id;
    }
  },
  methods: {
    resetModal: function resetModal() {
      this.form.reset();
      this.form.clearErrors();
    },
    handleOk: function handleOk(bvModalEvt) {
      var _this = this;

      bvModalEvt.preventDefault();
      this.$swal.fire({
        icon: "question",
        text: "Tem a certeza que alterar a base de dados associada ao cliente?",
        showCancelButton: true
      }).then(function (result) {
        if (result.isConfirmed) {
          _this.form.post("/clientes/".concat(_this.slug, "/editar_base_dados"), {
            data: {
              table_id: _this.form.table_id
            },
            onSuccess: function onSuccess() {
              // this.$emit('reload');
              _this.$bvModal.hide('modal-changeDatabase');

              _this.showToast("Base de dados alterada com sucesso!");
            }
          });
        }
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue":
/*!********************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b& */ "./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b&");
/* harmony import */ var _DatabaseClientesEdit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DatabaseClientesEdit.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DatabaseClientesEdit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__.render,
  _DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DatabaseClientesEdit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./DatabaseClientesEdit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DatabaseClientesEdit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b& ***!
  \***************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DatabaseClientesEdit_vue_vue_type_template_id_2a07fa3b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b&":
/*!******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Clientes/DatabaseClientesEdit.vue?vue&type=template&id=2a07fa3b& ***!
  \******************************************************************************************************************************************************************************************************************************************/
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
    "b-modal",
    {
      attrs: {
        id: "modal-changeDatabase",
        title: "Alterar base de dados",
        centered: "",
      },
      on: { show: _vm.resetModal, hidden: _vm.resetModal, ok: _vm.handleOk },
    },
    [
      _c(
        "form",
        [
          _c(
            "b-form-group",
            {
              attrs: {
                label: "Nome da base de dados",
                "label-for": "databaseName",
              },
            },
            [
              _c("b-form-input", {
                class: { "is-invalid": _vm.form.errors.table_id },
                attrs: { id: "databaseName", required: "" },
                model: {
                  value: _vm.form.table_id,
                  callback: function ($$v) {
                    _vm.$set(_vm.form, "table_id", $$v)
                  },
                  expression: "form.table_id",
                },
              }),
              _vm._v(" "),
              _c("b-form-invalid-feedback", [
                _vm._v(
                  "\n                " +
                    _vm._s(_vm.form.errors.table_id) +
                    ".\n            "
                ),
              ]),
            ],
            1
          ),
        ],
        1
      ),
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);