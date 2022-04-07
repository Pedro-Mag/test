<template>
    <div>
        <PageTitle titulo="Gestão de mensagens de eventos" />

        <b-row align-h="between">
            <b-col sm class="col-md-auto mb-1 mb-md-0">
                <Link
                    as-button
                    class="btn btn-outline-primary w-100"
                    href="/eventos/criar"
                    :disabled="!can.edit"
                >
                    Criar nova mensagem
                </Link>
            </b-col>
            <b-col sm class="col-md-auto">
                <div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        v-model="search"
                        type="text"
                        class="form-control"
                        placeholder="Procurar..."
                    />
                </div>
            </b-col>
        </b-row>

        <b-table
            id="table-mensagens"
            responsive
            hover
            show-empty
            :items="messages.data"
            :fields="fields"
            thead-class="text-uppercase text-secondary fw-bolder small opacity-75"
        >
            <template #cell(edit)="data">
                <Link
                    v-if="can.edit"
                    :href="'/eventos/' + data.item.id + '/editar'"
                    v-b-tooltip.hover
                    title="Clique para editar"
                    ><Icon mdi="square-edit-outline" size="md"
                /></Link>
            </template>
            <template #cell(delete)="data">
                <a
                    href="#"
                    v-if="can.edit"
                    v-b-tooltip.hover
                    @click="delMessage(data.item.id)"
                    title="Clique para eliminar"
                    ><Icon mdi="delete" size="md"
                /></a>
            </template>
            <template #empty="scope">
                <p>Sem dados para apresentar...</p>
            </template>
            <template #emptyfiltered="scope">
                <p>Não há registros correspondentes ao termo de procura...</p>
            </template>
        </b-table>

        <Paginator v-if="messages.last_page > 1" :links="messages.links" />
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
            search: null,
            fields: [
                {
                    key: "id",
                    label: "id",
                    tdClass: "small align-middle",
                },
                {
                    key: "message",
                    label: "Mensagem",
                    tdClass: "small align-middle",
                },
                {
                    key: "model",
                    label: "Modelo a utilizar",
                    tdClass: "small align-middle",
                },
                {
                    key: "name",
                    label: "Referência no modelo",
                    tdClass: "small align-middle",
                },
                {
                    key: "href",
                    label: "Ligação",
                    tdClass: "small align-middle",
                },
                {
                    key: "reference",
                    label: "Referência da ligação",
                    tdClass: "small align-middle",
                },
                {
                    key: "edit",
                    label: "",
                },
                {
                    key: "delete",
                    label: "",
                    tdClass: "text-danger",
                },
            ],
        };
    },
    props: {
        messages: Object,
        can: Object,
    },
    watch: {
        search: debounce(function (value) {
            this.$inertia.get(
                "/eventos",
                { search: value },
                { preserveState: true, replace: true }
            );
        }),
    },
    methods:{
        delMessage(id) {
            this.$swal
                .fire({
                    icon: "warning",
                    text: "Tem a certeza que deseja eliminar a mensagem?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete("/eventos/" + id, {
                            onSuccess: () => {
                                this.showToast("Mensagem eliminada com sucesso!");
                            },
                        });
                    }
                });
        },
    }
};
</script>

<style>
#table-mensagens .mdi {
    color: rgb(124, 124, 124);
}

#table-mensagens .mdi-square-edit-outline:hover {
    color: #007bff;
}

#table-mensagens .mdi-delete:hover {
    color: #dc3545;
}
</style>
