<template>
    <b-modal
        id="edit-modules-modal"
        centered
        cancel-title="Cancelar"
        :ok-only="!can.edit"
        :ok-title="can.edit ? 'Editar' : 'Voltar'"
        @ok="handleOk"
        @hidden="resetForm"
    >
        <template #modal-title>
            <Icon mdi="view-grid" />
            <span v-if="can.edit"> Editar módulo</span>
            <span v-else> Visualizar módulo</span>
        </template>

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Designação do módulo:"
                label-for="text"
                description="Obrigatório! Texto que identificará o módulo."
            >
                <b-form-input
                    id="text"
                    v-model="form.text"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.text }"
                    :readonly="!can.edit"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.text }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Permissão associada:"
                label-for="name"
                description="Obrigatório! Texto, sem espaços, que identificará a permissão associada."
            >
                <b-form-input
                    id="name"
                    v-model="form.name"
                    placeholder="Inserir permissão..."
                    :class="{ 'is-invalid': form.errors.name }"
                    :readonly="!can.edit"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Icon:"
                label-for="icon"
                description="Nome do icon que representa o módulo."
            >
                <b-row>
                    <b-col
                        ><b-form-input
                            id="icon"
                            v-model="form.icon"
                            placeholder="Inserir icon..."
                            :class="{ 'is-invalid': form.errors.icon }"
                            :readonly="!can.edit"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.icon }}
                        </b-form-invalid-feedback></b-col
                    >
                    <b-col class="col-auto"
                        ><Icon :mdi="form.icon" size="md" class="mr-3"
                    /></b-col>
                </b-row>
            </b-form-group>

            <b-form-group
                label="URL:"
                label-for="url"
                description="Endereço onde o módulo abre."
            >
                <b-form-input
                    id="url"
                    v-model="form.url"
                    placeholder="Inserir url..."
                    :class="{ 'is-invalid': form.errors.url }"
                    :readonly="!can.edit"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.url }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Módulo base:"
                description="Módulo do qual o novo dependerá."
            >
                <b-form-input :value="moduleText" disabled></b-form-input>
            </b-form-group>

            <input type="hidden" id="id" v-model="form.id" />
        </b-form>
    </b-modal>
</template>

<script>
import axios from "axios";

export default {
    props: {
        currentId: Number,
        can: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                text: null,
                name: null,
                icon: null,
                url: null,
                module_id: null,
            }),
            moduleText: "Raiz dos módulos",
        };
    },
    watch: {
        currentId: function () {
            if (this.currentId !== null) {
                this.form.id = this.currentId;
                axios
                    .get(`/modulos/${this.currentId}/editar`)
                    .then((response) => {
                        for (var key in response.data) {
                            this.form[key] = response.data[key];
                        }
                    });
            }
        },
    },
    methods: {
        handleOk(bvModalEvt) {
            if (this.can.edit) {
                bvModalEvt.preventDefault();
                this.$swal
                    .fire({
                        icon: "question",
                        text: "Tem a certeza que deseja actualizar a informação do módulo?",
                        showCancelButton: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            this.form.put(`/modulos/${this.form.id}`, {
                                onSuccess: () => {
                                    this.$bvModal.hide("edit-modules-modal");
                                    this.showToast(
                                        "Módulo editado com sucesso!"
                                    );
                                    this.resetForm();
                                },
                            });
                        }
                    });
            }
        },
        resetForm() {
            this.$emit("reset-id");
            this.form.reset();
            this.form.clearErrors();
        },
    },
};
</script>

<style></style>
