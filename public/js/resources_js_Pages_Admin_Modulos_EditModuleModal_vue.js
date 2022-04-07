"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Modulos_EditModuleModal_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    currentId: Number,
    can: Object
  },
  data: function data() {
    return {
      form: this.$inertia.form({
        id: null,
        text: null,
        name: null,
        icon: null,
        url: null,
        module_id: null
      }),
      moduleText: "Raiz dos módulos"
    };
  },
  watch: {
    currentId: function currentId() {
      var _this = this;

      if (this.currentId !== null) {
        this.form.id = this.currentId;
        axios__WEBPACK_IMPORTED_MODULE_0___default().get("/modulos/".concat(this.currentId, "/editar")).then(function (response) {
          for (var key in response.data) {
            _this.form[key] = response.data[key];
          }
        });
      }
    }
  },
  methods: {
    handleOk: function handleOk(bvModalEvt) {
      var _this2 = this;

      if (this.can.edit) {
        bvModalEvt.preventDefault();
        this.$swal.fire({
          icon: "question",
          text: "Tem a certeza que deseja actualizar a informação do módulo?",
          showCancelButton: true
        }).then(function (result) {
          if (result.isConfirmed) {
            _this2.form.put("/modulos/".concat(_this2.form.id), {
              onSuccess: function onSuccess() {
                _this2.$bvModal.hide("edit-modules-modal");

                _this2.showToast("Módulo editado com sucesso!");

                _this2.resetForm();
              }
            });
          }
        });
      }
    },
    resetForm: function resetForm() {
      this.$emit("reset-id");
      this.form.reset();
      this.form.clearErrors();
    }
  }
});

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue":
/*!**************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/EditModuleModal.vue ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./EditModuleModal.vue?vue&type=template&id=516148e8& */ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8&");
/* harmony import */ var _EditModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./EditModuleModal.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _EditModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__.render,
  _EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Modulos/EditModuleModal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EditModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./EditModuleModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EditModuleModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8& ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EditModuleModal_vue_vue_type_template_id_516148e8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./EditModuleModal.vue?vue&type=template&id=516148e8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/EditModuleModal.vue?vue&type=template&id=516148e8& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
        id: "edit-modules-modal",
        centered: "",
        "cancel-title": "Cancelar",
        "ok-only": !_vm.can.edit,
        "ok-title": _vm.can.edit ? "Editar" : "Voltar",
      },
      on: { ok: _vm.handleOk, hidden: _vm.resetForm },
      scopedSlots: _vm._u([
        {
          key: "modal-title",
          fn: function () {
            return [
              _c("Icon", { attrs: { mdi: "view-grid" } }),
              _vm._v(" "),
              _vm.can.edit
                ? _c("span", [_vm._v(" Editar módulo")])
                : _c("span", [_vm._v(" Visualizar módulo")]),
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
                  readonly: !_vm.can.edit,
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
                  readonly: !_vm.can.edit,
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
                          readonly: !_vm.can.edit,
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
                  _c(
                    "b-col",
                    { staticClass: "col-auto" },
                    [
                      _c("Icon", {
                        staticClass: "mr-3",
                        attrs: { mdi: _vm.form.icon, size: "md" },
                      }),
                    ],
                    1
                  ),
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
                  readonly: !_vm.can.edit,
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
                value: _vm.form.id,
                expression: "form.id",
              },
            ],
            attrs: { type: "hidden", id: "id" },
            domProps: { value: _vm.form.id },
            on: {
              input: function ($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.$set(_vm.form, "id", $event.target.value)
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