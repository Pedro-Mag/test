<template>
    <div>
        <PageTitle titulo="Gestão de módulos" />

        <b-row align-h="between">
            <b-col sm class="col-md-auto mb-1 mb-md-0">
                <div class="w-100 d-flex justify-content-between">
                    <button
                        class="btn btn-outline-primary w-100"
                        @click="createModule(null)"
                        :disabled="!this.can.edit"
                    >
                        Novo módulo
                    </button>
                    <b-button-group class="ml-2">
                        <b-button
                            variant="outline-secondary"
                            v-b-tooltip.hover
                            title="Fechar todos os módulos"
                            @click="
                                openAll = false;
                                filter = '';
                            "
                            ><Icon mdi="arrow-collapse-vertical"
                        /></b-button>
                        <b-button
                            variant="outline-secondary"
                            v-b-tooltip.hover
                            title="Expandir todos os módulos"
                            @click="openAll = true"
                            ><Icon mdi="arrow-expand-vertical"
                        /></b-button>
                    </b-button-group>
                </div>
            </b-col>
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
                    :can="can"
                    v-on:action-in-module="ActionInModule($event)"
                />
                <Modules
                    v-if="module.child_modules.length"
                    :modules="module.child_modules"
                    :baseDiv="'#div_' + module.id"
                    :filter="filter"
                    :can="can"
                    :open="openAll"
                    v-on:action-in-module="ActionInModule($event)"
                />
            </li>
        </ul>

        <AddModuleModal :currentId="currentId" v-on:reset-id="resetId" />
        <EditModuleModal :currentId="currentId" :can="can" v-on:reset-id="resetId" />
    </div>
</template>

<script>
import Modules from "./Modules";
import ModulesHeader from "./ModulesHeader";
import AddModuleModal from "./AddModuleModal";
import EditModuleModal from "./EditModuleModal";

export default {
    components: {
        Modules,
        ModulesHeader,
        AddModuleModal,
        EditModuleModal,
    },
    data() {
        return {
            currentId: null,
            openAll: false,
            filter: "",
        };
    },
    props: {
        modules: Array,
        can: Object,
    },
    methods: {
        ActionInModule(data) {
            if (data.action == "add") this.createModule(data.id);
            if (data.action == "show") this.showModule(data.id);
            if (data.action == "edit") this.editModule(data.id);
            if (data.action == "destroy") this.destroyModule(data.id);
            if (data.action == "move")
                this.reorderModule(data.id, data.direction);
        },
        createModule(id) {
            this.currentId = id;
            this.$bvModal.show("add-modules-modal");
        },
        showModule(id) {
            this.currentId = id;
            this.$bvModal.show("edit-modules-modal");
        },
        editModule(id) {
            this.currentId = id;
            this.$bvModal.show("edit-modules-modal");
        },
        destroyModule(id) {
            this.$swal
                .fire({
                    icon: "warning",
                    text: "Tem a certeza que deseja eliminar o módulo?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(`/modulos/${id}`);
                    }
                });
        },
        reorderModule(id, direction) {
            this.$inertia.post(
                `/modulos/${id}/reorder`,
                { direction: direction },
                { replace: true, preserveScroll: true }
            );
        },
        resetId() {
            this.currentId = null;
        },
    },
};
</script>

<style></style>
