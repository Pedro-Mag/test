<template>
    <b-modal
        id="modal-changeDatabase"
        title="Alterar base de dados"
        @show="resetModal"
        @hidden="resetModal"
        @ok="handleOk"
        centered
    >
        <form>
            <b-form-group
                label="Nome da base de dados"
                label-for="databaseName"
            >
                <b-form-input
                    id="databaseName"
                    v-model="form.table_id"
                    :class="{ 'is-invalid': form.errors.table_id }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.table_id }}.
                </b-form-invalid-feedback>
            </b-form-group>
        </form>
    </b-modal>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                table_id: this.table_id,
            }),
        };
    },
    props: {
        table_id: String,
        slug: String,
    },
    watch: {
        table_id: function () {
            this.form.table_id = this.table_id;
        },
    },
    methods: {
        resetModal() {
            this.form.reset();
            this.form.clearErrors();
        },
        handleOk(bvModalEvt) {
            bvModalEvt.preventDefault();
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que alterar a base de dados associada ao cliente?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post(`/clientes/${this.slug}/editar_base_dados`, {
                            data: { table_id: this.form.table_id },
                            onSuccess: () => {
                                // this.$emit('reload');
                                this.$bvModal.hide('modal-changeDatabase')
                                this.showToast(
                                    "Base de dados alterada com sucesso!"
                                );
                            },
                        });
                    }
                });
        },
    },
};
</script>

<style></style>
