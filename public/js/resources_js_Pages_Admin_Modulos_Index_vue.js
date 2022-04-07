"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Admin_Modulos_Index_vue"],{

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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Modules__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Modules */ "./resources/js/Pages/Admin/Modulos/Modules.vue");
/* harmony import */ var _ModulesHeader__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ModulesHeader */ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue");
/* harmony import */ var _AddModuleModal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./AddModuleModal */ "./resources/js/Pages/Admin/Modulos/AddModuleModal.vue");
/* harmony import */ var _EditModuleModal__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./EditModuleModal */ "./resources/js/Pages/Admin/Modulos/EditModuleModal.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    Modules: _Modules__WEBPACK_IMPORTED_MODULE_0__["default"],
    ModulesHeader: _ModulesHeader__WEBPACK_IMPORTED_MODULE_1__["default"],
    AddModuleModal: _AddModuleModal__WEBPACK_IMPORTED_MODULE_2__["default"],
    EditModuleModal: _EditModuleModal__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      currentId: null,
      openAll: false,
      filter: ""
    };
  },
  props: {
    modules: Array,
    can: Object
  },
  methods: {
    ActionInModule: function ActionInModule(data) {
      if (data.action == "add") this.createModule(data.id);
      if (data.action == "show") this.showModule(data.id);
      if (data.action == "edit") this.editModule(data.id);
      if (data.action == "destroy") this.destroyModule(data.id);
      if (data.action == "move") this.reorderModule(data.id, data.direction);
    },
    createModule: function createModule(id) {
      this.currentId = id;
      this.$bvModal.show("add-modules-modal");
    },
    showModule: function showModule(id) {
      this.currentId = id;
      this.$bvModal.show("edit-modules-modal");
    },
    editModule: function editModule(id) {
      this.currentId = id;
      this.$bvModal.show("edit-modules-modal");
    },
    destroyModule: function destroyModule(id) {
      var _this = this;

      this.$swal.fire({
        icon: "warning",
        text: "Tem a certeza que deseja eliminar o módulo?",
        showCancelButton: true
      }).then(function (result) {
        if (result.isConfirmed) {
          _this.$inertia["delete"]("/modulos/".concat(id));
        }
      });
    },
    reorderModule: function reorderModule(id, direction) {
      this.$inertia.post("/modulos/".concat(id, "/reorder"), {
        direction: direction
      }, {
        replace: true,
        preserveScroll: true
      });
    },
    resetId: function resetId() {
      this.currentId = null;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ModulesHeader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ModulesHeader */ "./resources/js/Pages/Admin/Modulos/ModulesHeader.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "Modules",
  components: {
    ModulesHeader: _ModulesHeader__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      child_module_status: false
    };
  },
  props: {
    modules: Array,
    baseDiv: String,
    filter: String,
    open: Boolean,
    can: Object
  },
  watch: {
    filter: function filter() {
      if (!this.filter || this.filter.length < 3) this.child_module_status = false;
    }
  },
  methods: {
    openParents: function openParents() {
      this.$emit("open-parent");
      this.child_module_status = true;
    },
    actionInModule: function actionInModule(data) {
      this.$emit("action-in-module", data);
    }
  }
});

/***/ }),

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

/***/ "./resources/js/Pages/Admin/Modulos/Index.vue":
/*!****************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Index.vue ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=19e4bfe7& */ "./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__.render,
  _Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Modulos/Index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/Modules.vue":
/*!******************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Modules.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Modules.vue?vue&type=template&id=472e1e48& */ "./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48&");
/* harmony import */ var _Modules_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Modules.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Modules_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__.render,
  _Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Admin/Modulos/Modules.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

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

/***/ "./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Modules_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Modules.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Modules_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

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

/***/ "./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7&":
/*!***********************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_19e4bfe7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Index.vue?vue&type=template&id=19e4bfe7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7&");


/***/ }),

/***/ "./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Modules_vue_vue_type_template_id_472e1e48___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Modules.vue?vue&type=template&id=472e1e48& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48&");


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



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Index.vue?vue&type=template&id=19e4bfe7& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
      _c("PageTitle", { attrs: { titulo: "Gestão de módulos" } }),
      _vm._v(" "),
      _c(
        "b-row",
        { attrs: { "align-h": "between" } },
        [
          _c(
            "b-col",
            { staticClass: "col-md-auto mb-1 mb-md-0", attrs: { sm: "" } },
            [
              _c(
                "div",
                { staticClass: "w-100 d-flex justify-content-between" },
                [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-outline-primary w-100",
                      attrs: { disabled: !this.can.edit },
                      on: {
                        click: function ($event) {
                          return _vm.createModule(null)
                        },
                      },
                    },
                    [
                      _vm._v(
                        "\n                    Novo módulo\n                "
                      ),
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-button-group",
                    { staticClass: "ml-2" },
                    [
                      _c(
                        "b-button",
                        {
                          directives: [
                            {
                              name: "b-tooltip",
                              rawName: "v-b-tooltip.hover",
                              modifiers: { hover: true },
                            },
                          ],
                          attrs: {
                            variant: "outline-secondary",
                            title: "Fechar todos os módulos",
                          },
                          on: {
                            click: function ($event) {
                              _vm.openAll = false
                              _vm.filter = ""
                            },
                          },
                        },
                        [
                          _c("Icon", {
                            attrs: { mdi: "arrow-collapse-vertical" },
                          }),
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "b-button",
                        {
                          directives: [
                            {
                              name: "b-tooltip",
                              rawName: "v-b-tooltip.hover",
                              modifiers: { hover: true },
                            },
                          ],
                          attrs: {
                            variant: "outline-secondary",
                            title: "Expandir todos os módulos",
                          },
                          on: {
                            click: function ($event) {
                              _vm.openAll = true
                            },
                          },
                        },
                        [
                          _c("Icon", {
                            attrs: { mdi: "arrow-expand-vertical" },
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
            ]
          ),
          _vm._v(" "),
          _c("b-col", { staticClass: "col-md-auto", attrs: { sm: "" } }, [
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
      _vm.modules
        ? _c(
            "ul",
            { staticClass: "accordion pl-0", attrs: { id: "modulesCard" } },
            _vm._l(_vm.modules, function (module) {
              return _c(
                "li",
                {
                  key: module.id,
                  staticClass: "card border-left border-right",
                },
                [
                  _c("ModulesHeader", {
                    attrs: {
                      module: module,
                      baseDiv: "#div_" + module.id,
                      filter: _vm.filter,
                      can: _vm.can,
                    },
                    on: {
                      "action-in-module": function ($event) {
                        return _vm.ActionInModule($event)
                      },
                    },
                  }),
                  _vm._v(" "),
                  module.child_modules.length
                    ? _c("Modules", {
                        attrs: {
                          modules: module.child_modules,
                          baseDiv: "#div_" + module.id,
                          filter: _vm.filter,
                          can: _vm.can,
                          open: _vm.openAll,
                        },
                        on: {
                          "action-in-module": function ($event) {
                            return _vm.ActionInModule($event)
                          },
                        },
                      })
                    : _vm._e(),
                ],
                1
              )
            }),
            0
          )
        : _vm._e(),
      _vm._v(" "),
      _c("AddModuleModal", {
        attrs: { currentId: _vm.currentId },
        on: { "reset-id": _vm.resetId },
      }),
      _vm._v(" "),
      _c("EditModuleModal", {
        attrs: { currentId: _vm.currentId, can: _vm.can },
        on: { "reset-id": _vm.resetId },
      }),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/Admin/Modulos/Modules.vue?vue&type=template&id=472e1e48& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
  return _vm.modules
    ? _c(
        "b-collapse",
        {
          staticClass: "accordion pl-0 mt-2 mb-2",
          attrs: {
            id: _vm.baseDiv,
            visible: _vm.child_module_status || _vm.open,
          },
        },
        _vm._l(_vm.modules, function (module) {
          return _c(
            "li",
            {
              key: module.id,
              staticClass:
                "card border-left border-right ml-1 ml-md-3 mr-0 mr-md-1",
            },
            [
              _c("ModulesHeader", {
                attrs: {
                  module: module,
                  baseDiv: "#div_" + module.id,
                  filter: _vm.filter,
                  can: _vm.can,
                },
                on: {
                  "action-in-module": function ($event) {
                    return _vm.actionInModule($event)
                  },
                  "open-parent": function ($event) {
                    return _vm.openParents()
                  },
                },
              }),
              _vm._v(" "),
              module.child_modules.length
                ? _c("Modules", {
                    attrs: {
                      modules: module.child_modules,
                      baseDiv: "#div_" + module.id,
                      filter: _vm.filter,
                      can: _vm.can,
                      open: _vm.open,
                    },
                    on: {
                      "action-in-module": function ($event) {
                        return _vm.actionInModule($event)
                      },
                      "open-parent": function ($event) {
                        return _vm.openParents()
                      },
                    },
                  })
                : _vm._e(),
            ],
            1
          )
        }),
        0
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



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