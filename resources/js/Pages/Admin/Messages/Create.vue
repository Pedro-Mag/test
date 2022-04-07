<template>
    <div>
        <PageTitle titulo="Criar mensagem de evento" />

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Mensagem:"
                label-for="message"
                description="Mensagem correspondente ao evento."
            >
                <b-form-input
                    id="message"
                    v-model="form.message"
                    type="text"
                    ref="message"
                    placeholder="Inserir mensagem..."
                    :class="{ 'is-invalid': form.errors.message }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.message }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Modelo a utilizar:"
                label-for="model"
                description="Modelo que referencia o objecto do evento."
            >
                <b-form-input
                    id="model"
                    v-model="form.model"
                    type="text"
                    ref="model"
                    placeholder="Inserir modelo..."
                    :class="{ 'is-invalid': form.errors.model }"
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.model }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Referência no modelo:"
                label-for="name"
                description="Referência no objecto do evento (nome, id, ...)"
            >
                <b-form-input
                    id="name"
                    v-model="form.name"
                    type="text"
                    ref="name"
                    placeholder="Inserir referência..."
                    :class="{ 'is-invalid': form.errors.name }"
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Ligação:"
                label-for="href"
                description="Endereço que liga ao modelo."
            >
                <b-form-input
                    id="href"
                    v-model="form.href"
                    type="text"
                    ref="href"
                    placeholder="Inserir ligação..."
                    :class="{ 'is-invalid': form.errors.href }"
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.href }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Referência da ligação:"
                label-for="reference"
                description="Referência ao objecto do evento na ligação (slug, id, ...)."
            >
                <b-form-input
                    id="reference"
                    v-model="form.reference"
                    type="text"
                    ref="reference"
                    placeholder="Inserir referência..."
                    :class="{ 'is-invalid': form.errors.reference }"
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.reference }}
                </b-form-invalid-feedback>
            </b-form-group>
        </b-form>

        <WorkingPanelFooter>
            <template #cancel>
                <b-button @click="handleGoBack()">Cancelar</b-button>
            </template>

            <b-button
                variant="primary"
                :disabled="!form.isDirty || form.processing"
                @click="handleOk()"
                ><div
                    class="spinner-border spinner-border-sm text-light"
                    role="status"
                    v-if="form.processing"
                >
                    <span></span>
                </div>
                Criar mensagem</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";

export default {
    components: {
        WorkingPanelFooter,
        ErrorAlert,
    },
    data() {
        return {
            form: this.$inertia.form({
                message: null,
                model: null,
                name: null,
                href: null,
                reference: null,
            }),
        };
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja criar uma nova mensagem?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/eventos", {
                            onSuccess: () => {
                                this.showToast("Mensagem criada com sucesso!");
                            },
                        });
                    }
                });
        },
        handleGoBack() {
            history.back();
            return false;
        },
    },
};
</script>

<style></style>
