<template>
    <div>
        <PageTitle titulo="Criar grupo de utilizadores" />

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Designação do grupo:"
                label-for="name"
            >
                <b-form-input
                    id="name"
                    v-model="form.name"
                    type="text"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.name }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Descrição do grupo:"
                label-for="descricao"
                description="Conjunto de orientações de modo a orientar a seleccção do grupo"
            >
                <b-form-textarea
                    id="descricao"
                    v-model="form.descricao"
                    type="text"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.descricao }"
                    required
                ></b-form-textarea>
                <b-form-invalid-feedback>
                    {{ form.errors.descricao }}
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
                Criar grupo de utilizadores</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";


export default {
    components: {
        ErrorAlert,
        WorkingPanelFooter
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                descricao: null,
            }),
        };
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja criar um novo grupo de utilizadores?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/config/grupos_utilizadores", {
                            onSuccess: () => {
                                this.showToast("Grupo de utilizadores criado com sucesso!");
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
