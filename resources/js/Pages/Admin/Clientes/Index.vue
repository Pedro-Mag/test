<template>
    <div>
        <PageTitle titulo="Gestão de clientes" />

        <b-row align-h="between">

            <b-col sm class="col-md-auto mb-1 mb-md-0">
            <b-button-group class="w-100" v-if="can.edit">
                <Link
                    href="/clientes/criar"
                    class="btn btn-outline-primary"
                    :class="{ disabled: !can.edit }"
                    role="button"
                    as-button
                >
                    Novo cliente
                </Link>
                <b-button :pressed="showAll" variant="primary" @click="showAll = !showAll">
                    <Icon :mdi="showAll ? 'filter-off' : 'filter'" />
                    Mostrar todos
                </b-button>
            </b-button-group>
            </b-col>
            <b-col sm class="col-md-auto">
                <div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        v-model="search"
                        placeholder="Procurar..."
                    />
                </div>
            </b-col>
        </b-row>

        <div v-if="clientes.total">
            <ClientesTable :clientes="clientes.data" />
            <Paginator v-if="clientes.total > 9" :links="clientes.links" />
        </div>

        <div v-else class="card border">
            <div class="card-body">
                Nenhum cliente associado!
            </div>
        </div>

    </div>
</template>

<script>
import Paginator from "@/Shared/Pagination";
import ClientesTable from "./ClientesTable";
import { debounce } from "lodash";

export default {
    components: { ClientesTable, Paginator },
    data: function () {
        return {
            showAll: this.filters.showAll,
            search: this.filters.search,
        };
    },
    props: {
        clientes: Object,
        filters: Object,
        can: Object,
    },
    watch: {
        showAll: function (value) {
            this.$inertia.get("clientes", { showAll: value, search: this.search });
        },
        search: debounce(function (value) {
            this.$inertia.get(
                "/clientes",
                { showAll: this.showAll, search: this.search },
                { preserveState: true, replace: true }
            );
        }),
    },
    methods: {},
};
</script>

<style>
.avatar-sm {
    width: 36px !important;
    height: 36px !important;
    font-size: 0.875rem;
}

.b-avatar {
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.75rem !important;
    height: 48px !important;
    width: 48px !important;
    transition: all 0.2s ease-in-out;
    border: #6c757d solid 1px;
}
</style>
