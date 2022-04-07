"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Modulos_AddModuleModal_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
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
  props: {
    currentId: Number
  },
  data: function data() {
    return {
      form: this.$inertia.form({
        text: null,
        name: null,
        icon: null,
        url: null,
        parent_id: null
      }),
      moduleText: "Raiz dos módulos"
    };
  },
  watch: {
    currentId: function currentId() {
      var _this = this;

      if (this.currentId !== null) {
        axios__WEBPACK_IMPORTED_MODULE_0___default().get("/modulos/".concat(this.currentId, "/get/text")).then(function (response) {
          _this.moduleText = response.data;
        });
      } else {
        this.moduleText = "Raiz dos módulos";
      }

      this.form.parent_id = this.currentId;
    }
  },
  methods: {
    handleOk: function handleOk(bvModalEvt) {
      var _this2 = this;

      bvModalEvt.preventDefault();
      this.$swal.fire({
        icon: "question",
        text: "Tem a certeza que deseja criar um novo módulo?",
        showCancelButton: true
      }).then(function (result) {
        if (result.isConfirmed) {
          _this2.form.post("/modulos", {
            onSuccess: function onSuccess() {
              _this2.$bvModal.hide("add-modules-modal");

              _this2.showToast("Módulo criado com sucesso!");

              _this2.resetForm();

              _this2.$emit("reset-id");
            }
          });
        }
      });
    },
    resetForm: function resetForm() {
      this.form.reset();
      this.form.clearErrors();
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue":
/*!*************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/AddModuleModal.vue ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddModuleModal.vue?vue&type=template&id=5c5489fb& */ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb&");
/* harmony import */ var _AddModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AddModuleModal.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AddModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__.render,
  _AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Modulos/AddModuleModal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AddModuleModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb&":
/*!********************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddModuleModal_vue_vue_type_template_id_5c5489fb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AddModuleModal.vue?vue&type=template&id=5c5489fb& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/AddModuleModal.vue?vue&type=template&id=5c5489fb& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
        id: "add-modules-modal",
        centered: "",
        "cancel-title": "Cancelar",
        "ok-title": "Criar",
      },
      on: { ok: _vm.handleOk, hidden: _vm.resetForm },
      scopedSlots: _vm._u([
        {
          key: "modal-title",
          fn: function () {
            return [
              _c("Icon", { attrs: { mdi: "view-grid-plus" } }),
              _vm._v("\n        Criar módulo\n    "),
            ]
          },
          proxy: true,
        },
      ]),
    },
    [
      _vm._v(" "),
      _c(
        "b-form",
        {
          on: {
            submit: function ($event) {
              $event.stopPropagation()
              $event.preventDefault()
              return _vm.handleSubmit.apply(null, arguments)
            },
          },
        },
        [
          _c(
            "b-form-group",
            {
              attrs: {
                label: "Designação do módulo:",
                "label-for": "text",
                description: "Obrigatório! Texto que identificará o módulo.",
              },
            },
            [
              _c("b-form-input", {
                class: { "is-invalid": _vm.form.errors.text },
                attrs: {
                  id: "text",
                  placeholder: "Inserir designação...",
                  required: "",
                },
                model: {
                  value: _vm.form.text,
                  callback: function ($$v) {
                    _vm.$set(_vm.form, "text", $$v)
                  },
                  expression: "form.text",
                },
              }),
              _vm._v(" "),
              _c("b-form-invalid-feedback", [
                _vm._v(
                  "\n                " +
                    _vm._s(_vm.form.errors.text) +
                    "\n            "
                ),
              ]),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-form-group",
            {
              attrs: {
                label: "Permissão associada:",
                "label-for": "name",
                description:
                  "Obrigatório! Texto, sem espaços, que identificará a permissão associada.",
              },
            },
            [
              _c("b-form-input", {
                class: { "is-invalid": _vm.form.errors.name },
                attrs: {
                  id: "name",
                  placeholder: "Inserir permissão...",
                  required: "",
                },
                model: {
                  value: _vm.form.name,
                  callback: function ($$v) {
                    _vm.$set(_vm.form, "name", $$v)
                  },
                  expression: "form.name",
                },
              }),
              _vm._v(" "),
              _c("b-form-invalid-feedback", [
                _vm._v(
                  "\n                " +
                    _vm._s(_vm.form.errors.name) +
                    "\n            "
                ),
              ]),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-form-group",
            {
              attrs: {
                label: "Icon:",
                "label-for": "icon",
                description: "Nome do icon que representa o módulo.",
              },
            },
            [
              _c(
                "b-row",
                [
                  _c(
                    "b-col",
                    [
                      _c("b-form-input", {
                        class: { "is-invalid": _vm.form.errors.icon },
                        attrs: {
                          id: "icon",
                          placeholder: "Inserir icon...",
                          required: "",
                        },
                        model: {
                          value: _vm.form.icon,
                          callback: function ($$v) {
                            _vm.$set(_vm.form, "icon", $$v)
                          },
                          expression: "form.icon",
                        },
                      }),
                      _vm._v(" "),
                      _c("b-form-invalid-feedback", [
                        _vm._v(
                          "\n                        " +
                            _vm._s(_vm.form.errors.icon) +
                            "\n                    "
                        ),
                      ]),
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _vm.form.icon
                    ? _c(
                        "b-col",
                        { staticClass: "col-auto" },
                        [
                          _c("Icon", {
                            staticClass: "mr-3",
                            attrs: { mdi: _vm.form.icon, size: "md" },
                          }),
                        ],
                        1
                      )
                    : _vm._e(),
                ],
                1
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-form-group",
            {
              attrs: {
                label: "URL:",
                "label-for": "url",
                description: "Endereço onde o módulo abre.",
              },
            },
            [
              _c("b-form-input", {
                class: { "is-invalid": _vm.form.errors.url },
                attrs: {
                  id: "url",
                  placeholder: "Inserir url...",
                  required: "",
                },
                model: {
                  value: _vm.form.url,
                  callback: function ($$v) {
                    _vm.$set(_vm.form, "url", $$v)
                  },
                  expression: "form.url",
                },
              }),
              _vm._v(" "),
              _c("b-form-invalid-feedback", [
                _vm._v(
                  "\n                " +
                    _vm._s(_vm.form.errors.url) +
                    "\n            "
                ),
              ]),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-form-group",
            {
              attrs: {
                label: "Módulo base:",
                description: "Módulo do qual o novo dependerá.",
              },
            },
            [
              _c("b-form-input", {
                attrs: { value: _vm.moduleText, disabled: "" },
              }),
            ],
            1
          ),
          _vm._v(" "),
          _c("input", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.form.currentId,
                expression: "form.currentId",
              },
            ],
            attrs: { type: "hidden", name: "parent_id" },
            domProps: { value: _vm.form.currentId },
            on: {
              input: function ($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.$set(_vm.form, "currentId", $event.target.value)
              },
            },
          }),
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