<template>
    <div>
        <PageTitle titulo="Departamentos" />

        <b-row align-h="between" class="mb-3">
            <b-col sm class="col-md-auto mb-1 mb-md-0">
                <Link
                    href="/config/departamentos/criar"
                    class="btn btn-outline-primary w-100"
                    :class="{ disabled: !can.create }"
                    role="button"
                    as-button
                >
                    Criar departamento
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
            :items="departamentos"
            :fields="fields"
            :filter="search"
            thead-class="text-uppercase text-secondary fw-bolder small opacity-75"
            tbody-tr-class="position-relative"
        >
            <template #cell(id)="data">
                <Link
                    :href="'/config/departamentos/' + data.item.slug"
                    v-if="can.view"
                    class="stretched-link"
                    v-b-tooltip.hover
                    title="Clique para visualizar"
                    ><Icon mdi="square-edit-outline"
                /></Link>
            </template>
            <template #empty="scope">
                <p>Sem dados para apresentar...</p>
            </template>
            <template #emptyfiltered="scope">
                <p>Não há registros correspondentes ao termo de procura...</p>
            </template>
        </b-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            search: "",
            fields: [
                {
                    key: "name",
                    label: "Designação",
                    sortable: true,
                },
                {
                    key: "descricao",
                    label: "Descrição",
                    sortable: false,
                    thClass: "align-middle d-none d-md-table-cell",
                    tdClass: "small align-middle d-none d-md-table-cell",
                },
                {
                    key: "id",
                    label: "",
                    sortable: false,
                    tdClass: "align-middle",
                },
            ],
        };
    },
    props: {
        departamentos: Array,
        can: Object,
    },
};
</script>

<style></style>
