<template>
    <b-collapse
        v-if="modules"
        class="accordion pl-0 mt-2 mb-2"
        :id="baseDiv"
        :visible="child_module_status || open"
    >
        <li
            class="card border-left border-right ml-1 ml-md-3 mr-0 mr-md-1"
            v-for="module in modules"
            :key="module.id"
        >
            <ModulesHeader
                :module="module"
                :baseDiv="'#div_' + module.id"
                :filter="filter"
                :owned="owned"
                :can="can"
                v-on:action-in-module="actionInModule($event)"
                v-on:open-parent="openParents()"
            />
            <Modules
                v-if="module.child_modules.length"
                :modules="module.child_modules"
                :owned="owned"
                :baseDiv="'#div_' + module.id"
                :filter="filter"
                :open="open"
                :can="can"
                v-on:action-in-module="actionInModule($event)"
                v-on:open-parent="openParents()"
            />
        </li>
    </b-collapse>
</template>

<script>
import ModulesHeader from "./ModulesHeader";

export default {
    name: "Modules",
    components: { ModulesHeader },
    data() {
        return {
            child_module_status: false,
        };
    },
    props: {
        modules: Array,
        owned: Array,
        baseDiv: String,
        filter: String,
        open: Boolean,
        can: Object
    },
    watch: {
        filter: function () {
            if (!this.filter || this.filter.length < 3)
                this.child_module_status = false;
        },
    },
    methods: {
        openParents() {
            this.$emit("open-parent");
            this.child_module_status = true;
        },
        actionInModule(data) {
            this.$emit("action-in-module", data);
        },
    },
};
</script>

<style></style>
