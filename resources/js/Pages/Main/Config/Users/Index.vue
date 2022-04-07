<template>
    <div>
        <PageTitle titulo="Utilizadores" />

        <b-row align-h="between" class="mb-3">
            <b-col sm class="col-md-auto mb-1 mb-md-0">
                <Link
                    href="/config/utilizadores/criar"
                    class="btn btn-outline-primary w-100"
                    :class="{ disabled: !can.create }"
                    role="button"
                    as-button
                >
                    Criar utilizador
                </Link>
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

        <b-table
            responsive
            hover
            show-empty
            :items="users.data"
            :fields="fields"
            thead-class="text-uppercase text-secondary fw-bolder small opacity-75"
            tbody-tr-class="position-relative"
        >
            <template #cell(name)="data">
                <div class="d-flex">
                    <div>
                        <b-avatar
                            v-if="data.item.avatar"
                            :src="data.item.avatar"
                        />
                        <b-avatar v-else :text="data.item.iniciais" />
                    </div>
                    <div class="d-flex flex-column justify-content-center ml-2">
                        <h6 class="mb-0">{{ data.item.name }}</h6>
                        <span class="small text-secondary mb-0">
                            {{ data.item.email }}
                        </span>
                    </div>
                </div>
            </template>
            <template #cell(id)="data">
                <Link
                    v-if="can.view"
                    :href="'/config/utilizadores/' + data.item.slug"
                    class="stretched-link"
                    v-b-tooltip.hover
                    title="Clique para ver detalhes"
                    ><Icon mdi="account-edit"
                /></Link>
            </template>
            <template #empty="scope">
                <p>Sem dados para apresentar...</p>
            </template>
        </b-table>

        <Paginator v-if="users.last_page > 1" :links="users.links" />
    </div>
</template>

<script>
import Paginator from "@/Shared/Pagination";
import { debounce } from "lodash";

export default {
    components: {
        Paginator,
    },
    data() {
        return {
            search: this.filters.search,
            fields: [
                {
                    key: "name",
                    label: "Nome",
                },
                {
                    key: "group-name",
                    label: "Grupo",
                    thClass: "align-middle d-none d-md-table-cell",
                    tdClass: "small align-middle d-none d-md-table-cell",
                },
                {
                    key: "id",
                    label: "",
                    tdClass: "align-middle",
                },
            ],
        };
    },
    props: {
        users: Object,
        filters: Array,
        can: Object,
    },
    watch: {
        search: debounce(function (value) {
            this.$inertia.get(
                "/config/utilizadores",
                { search: value },
                { preserveState: true, replace: true }
            );
        }),
    },
};
</script>

<style></style>
