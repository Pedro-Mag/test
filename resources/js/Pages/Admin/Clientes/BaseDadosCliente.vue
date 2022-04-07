<template>
    <div>
        <div>
            <label for="table_id">Base de dados:</label>
            <div class="row">
                <div class="col mb-2 mb-md-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text py-0"
                                v-if="db.exists"
                                style="color: green"
                                ><Icon mdi="check-bold" size="md"
                            /></span>
                            <span
                                class="input-group-text py-0"
                                v-else
                                style="color: red"
                                v-b-tooltip.hover
                                title="Base de dados não existe"
                                ><Icon mdi="close-circle" size="md"
                            /></span>
                        </div>
                        <b-form-input
                            type="text"
                            id="table_id"
                            v-model="cliente.table_id"
                            readonly
                        />
                        <div class="input-group-append" v-if="can.edit">
                            <button
                                class="input-group-text py-0"
                                v-b-tooltip.hover
                                title="Editar nome da base de dados"
                                v-b-modal.modal-changeDatabase
                            >
                                <Icon mdi="database-edit" size="md" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto" v-if="can.edit">
                    <button
                        v-if="!db.exists"
                        class="btn w-100 btn-outline-primary"
                        @click="createDatabase"
                    >
                        Criar base de dados
                    </button>
                    <button
                        v-else
                        class="btn w-100 btn-outline-secondary"
                        @click="migrateDatabase"
                        :disabled="!db.migrationsToRun"
                    >
                        Correr migrações pendentes
                    </button>
                </div>
            </div>
        </div>

        <EditDatabase
            :table_id="cliente.table_id"
            :slug="cliente.slug"
            v-on:reload="emit('reload')"
        />

        <b-table
            hover
            small
            responsive
            show-empty
            :fields="fields"
            :items="db.migrations"
            :per-page="perPage"
            :current-page="currentPage"
            sort-by="migration"
            sort-desc="true"
            class="mt-4 mb-3"
            id="migrationsList"
        >
            <template #cell(run)="data">
                <Icon
                    v-if="data.item.run"
                    mdi="check-circle-outline"
                    size="md"
                />
                <Icon v-else mdi="close-circle-outline" size="md" />
            </template>
            <template #empty="scope"
                ><small> Nenhuma migração para correr... </small></template
            >
        </b-table>

        <b-pagination
            v-if="perPage / rows < 1"
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            aria-controls="migrationsList"
            align="right"
        ></b-pagination>
    </div>
</template>

<script>
import EditDatabase from "./DatabaseClientesEdit";

export default {
    components: { EditDatabase },
    data() {
        return {
            fields: [
                {
                    key: "migration",
                    label: "Migração",
                    sortable: true,
                    tdClass: "align-middle small",
                },
                {
                    key: "run",
                    label: "Realizada",
                    sortable: true,
                    tdClass: "align-middle small text-center",
                },
            ],
            perPage: 10,
            currentPage: 1,
        };
    },
    computed: {
        rows() {
            return this.events.length;
        },
    },
    props: {
        cliente: Object,
        db: Object,
        can: Object,
        events: Array,
    },
    methods: {
        createDatabase() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja criar a base de dados associada ao cliente?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.visit(
                            `/clientes/${this.cliente.slug}/criar_base_dados`,
                            {
                                method: "post",
                                onError: (errors) => {
                                    console.log(errors);
                                    this.showToast(errors.create, "danger");
                                },
                                onSuccess: () => {
                                    this.showToast(
                                        "Base de dados criada com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },
        migrateDatabase() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja correr as migrações pendentes na base de dados associada ao cliente?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.visit(
                            `/clientes/${this.cliente.slug}/migrar_base_dados`,
                            {
                                method: "post",
                                onError: (errors) => {
                                    this.showToast(errors.create, "danger");
                                },
                                onSuccess: () => {
                                    this.showToast(
                                        "Migrações realizadas com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },
    },
};
</script>

<style>
#migrationsList .mdi-check-circle-outline {
    color: green;
}

#migrationsList .mdi-close-circle-outline {
    color: red;
}
</style>
