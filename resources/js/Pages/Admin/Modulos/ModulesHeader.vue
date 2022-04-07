<template>
    <div
        class="card-header bg-dark text-white d-flex flex-wrap align-items-center px-1 px-md-3"
        :class="{
            headerPointer: module.child_modules.length,
            filtered: filtered,
        }"
    >
        <div class="mr-0 mr-md-2">
            <Icon
                v-if="module.child_modules.length"
                :mdi="openStatus ? 'menu-down' : 'menu-right'"
                size="md"
            />
            <div v-else style="width: 24px"></div>
        </div>

        <div
            v-if="!module.child_modules.length"
            class="flex-grow-1 flex-shrink-0 d-flex align-items-center"
        >
            <Icon
                v-if="module.icon"
                :mdi="module.icon"
                size="md"
                class="pr-1 pr-md-2"
            />
            {{ module.text }}
        </div>

        <a
            v-else
            class="d-flex flex-grow-1 flex-shrink-0 align-items-center text-reset text-decoration-none"
            data-toggle="collapse"
            @click="toggleOpenStatus()"
            v-b-toggle="baseDiv"
        >
            <Icon
                v-if="module.icon"
                :mdi="module.icon"
                size="md"
                class="pr-1"
            />
            {{ module.text }}
        </a>

        <div
            v-if="this.can.edit"
            class="align-items-center flex-shrink-0 buttonGroup"
        >
            <b-button-group class="mr-2">
                <button
                    type="button"
                    class="btn btn-outline-light btn-sm module-create-btn"
                    v-b-tooltip.hover
                    title="Adicionar módulo filho"
                    @click="addModule(module.id)"
                >
                    <Icon mdi="plus" />
                </button>
                <button
                    type="button"
                    class="btn btn-outline-light btn-sm module-edit-btn"
                    v-b-tooltip.hover
                    title="Editar módulo"
                    @click="editModule(module.id)"
                >
                    <Icon mdi="pencil" />
                </button>
                <button
                    type="button"
                    class="btn btn-outline-light btn-sm module-delete-btn"
                    v-b-tooltip.hover
                    title="Eliminar módulo"
                    @click="destroyModule(module.id)"
                >
                    <Icon mdi="delete" />
                </button>
            </b-button-group>

            <b-button-group vertical id="moveUpDown">
                <button
                    type="button"
                    class="btn btn-sm btn-outline-light py-0 border-bottom-0"
                    v-b-tooltip.hover
                    title="Mover módulo acima"
                    @click="moveModule(module.id, -1)"
                >
                    <span class="mdi mdi-arrow-up"></span>
                </button>
                <button
                    type="button"
                    class="btn btn-sm btn-outline-light py-0 border-top-0"
                    v-b-tooltip.hover
                    title="Mover módulo abaixo"
                    @click="moveModule(module.id, 1)"
                >
                    <span class="mdi mdi-arrow-down"></span>
                </button>
            </b-button-group>
        </div>

        <div v-else>
            <button
                type="button"
                class="btn btn-outline-light btn-sm module-create-btn"
                v-b-tooltip.hover
                title="Ver detalhes do módulo"
                @click="showModule(module.id)"
            >
                <Icon mdi="eye" />
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            openStatus: false,
        };
    },
    props: {
        module: Object,
        baseDiv: String,
        filter: String,
        can: Object,
    },
    computed: {
        filtered() {
            if (this.filter && this.filter.length > 2) {
                const trasformFilter = this.filter
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase();

                return (
                    this.module.text
                        .normalize("NFD")
                        .replace(/[\u0300-\u036f]/g, "")
                        .toLowerCase()
                        .includes(trasformFilter) ||
                    this.module.name
                        .normalize("NFD")
                        .replace(/[\u0300-\u036f]/g, "")
                        .toLowerCase()
                        .includes(trasformFilter) ||
                    (this.module.url &&
                        this.module.url
                            .normalize("NFD")
                            .replace(/[\u0300-\u036f]/g, "")
                            .toLowerCase()
                            .includes(trasformFilter))
                );
            }
            return false;
        },
    },
    watch: {
        filtered: function () {
            if (this.filtered) this.$emit("open-parent");
        },
    },
    methods: {
        toggleOpenStatus() {
            this.openStatus = !this.openStatus;
        },
        addModule(id) {
            this.$emit("action-in-module", { action: "add", id: id });
        },
        showModule(id) {
            this.$emit("action-in-module", { action: "show", id: id });
        },
        editModule(id) {
            this.$emit("action-in-module", { action: "edit", id: id });
        },
        destroyModule(id) {
            this.$emit("action-in-module", { action: "destroy", id: id });
        },
        moveModule(id, direction) {
            this.$emit("action-in-module", {
                action: "move",
                id: id,
                direction: direction,
            });
        },
    },
};
</script>

<style>
#modulesCard .card:not(:last-of-type) {
    border-bottom: 1px solid #fff !important;
}

#modulesCard .headerPointer {
    cursor: pointer;
}

#modulesCard .buttonGroup {
    display: none;
}

#modulesCard .card-header {
    min-height: 60px !important;
}

#modulesCard .card-header.filtered {
    background-color: #4a8d5b !important;
}

#modulesCard .card-header:hover {
    background-color: #6c757d !important;
}

#modulesCard .card-header:hover > .buttonGroup {
    display: flex;
}

#modulesCard #moveUpDown button {
    height: 16px !important;
    font-size: 10px;
}
</style>
