<template>
    <div>
        <b-row align-h="between">
            <b-col sm class="col-md-auto mb-1 mb-md-0"> </b-col>
            <b-col sm class="col-md-auto">
                <div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        v-model="filter"
                        type="text"
                        class="form-control"
                        placeholder="Procurar..."
                    />
                </div>
            </b-col>
        </b-row>

        <ul v-if="modules" class="accordion pl-0" id="modulesCard">
            <li
                class="card border-left border-right"
                v-for="module in modules"
                :key="module.id"
            >
                <ModulesHeader
                    :module="module"
                    :baseDiv="'#div_' + module.id"
                    :filter="filter"
                    :owned="own_modules"
                    :can="can"
                    v-on:action-in-module="ActionInModule($event)"
                />
                <Modules
                    v-if="module.child_modules.length"
                    :modules="module.child_modules"
                    :owned="own_modules"
                    :baseDiv="'#div_' + module.id"
                    :filter="filter"
                    :open="openAll"
                    :can="can"
                    v-on:action-in-module="ActionInModule($event)"
                />
            </li>
        </ul>
    </div>
</template>

<script>
import Modules from "./Modules";
import ModulesHeader from "./ModulesHeader";

export default {
    components: { Modules, ModulesHeader },
    data: function () {
        return {
            openAll: false,
            filter: "",
        };
    },
    props: {
        cliente: Object,
        modules: Array,
        own_modules: Array,
        can: Object,
    },
    methods: {
        ActionInModule(data) {
            if (data.action == "toggle") this.ToggleModule(data.id, data.value);
        },
        ToggleModule(id, value) {
            this.$inertia.post(
                `/clientes/${this.cliente.slug}/module/${id}`,
                { value: value },
                { only: ["own_modules"], preserveScroll: true }
            );
        },
    },
};
</script>

<style></style>
