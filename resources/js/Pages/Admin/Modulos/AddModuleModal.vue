<template>
    <b-modal
        id="add-modules-modal"
        centered
        cancel-title="Cancelar"
        ok-title="Criar"
        @ok="handleOk"
        @hidden="resetForm"
    >
        <template #modal-title>
            <Icon mdi="view-grid-plus" />
            Criar módulo
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
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.icon }}
                        </b-form-invalid-feedback></b-col
                    >
                    <b-col class="col-auto" v-if="form.icon"
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

            <input type="hidden" name="parent_id" v-model="form.currentId" />
        </b-form>
    </b-modal>
</template>

<script>
import axios from "axios";

export default {
    props: {
        currentId: Number,
    },
    data() {
        return {
            form: this.$inertia.form({
                text: null,
                name: null,
                icon: null,
                url: null,
                parent_id: null,
            }),
            moduleText: "Raiz dos módulos",
        };
    },
    watch: {
        currentId: function () {
            if (this.currentId !== null) {
                axios
                    .get(`/modulos/${this.currentId}/get/text`)
                    .then((response) => {
                        this.moduleText = response.data;
                    });
            } else {
                this.moduleText = "Raiz dos módulos";
            }
            this.form.parent_id = this.currentId;
        },
    },
    methods: {
        handleOk(bvModalEvt) {
            bvModalEvt.preventDefault();
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja criar um novo módulo?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/modulos", {
                            onSuccess: () => {
                                this.$bvModal.hide("add-modules-modal");
                                this.showToast("Módulo criado com sucesso!");
                                this.resetForm();
                                this.$emit("reset-id");
                            },
                        });
                    }
                });
        },
        resetForm() {
            this.form.reset();
            this.form.clearErrors();
        },
    },
};
</script>

<style></style>
