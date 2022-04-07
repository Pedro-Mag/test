<template>
    <div>
        <PageTitle titulo="Criar novo utilizador" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Nome:"
                label-for="name"
                description="Nome e apelido, no minimo."
            >
                <b-form-input
                    id="name"
                    v-model="form.name"
                    placeholder="Inserir nome..."
                    :class="{ 'is-invalid': form.errors.name }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group label="Endereço de email:" label-for="email">
                <b-form-input
                    id="email"
                    v-model="form.email"
                    type="email"
                    placeholder="Inserir endereço de email..."
                    :class="{ 'is-invalid': form.errors.email }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.email }}.
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group label="Avatar:" label-for="avatar">
                <ImageUpload @ImageCropped="setImage($event)" tooltip="Clique para carregar foto do utilizador"/>
            </b-form-group>

            <b-form-group>
                <b-form-checkbox
                    id="admin_role_id"
                    v-model="form.admin_role_id"
                    name="admin_role_id"
                    value="1"
                    unchecked-value="2"
                >
                    Tem previlégios de administrador
                </b-form-checkbox></b-form-group
            >
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
                Criar utilizador</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import ImageUpload from "@/Shared/ImageUpload";
import VueCropper from "vue-cropperjs";
import "cropperjs/dist/cropper.css";

export default {
    components: { WorkingPanelFooter, VueCropper, ImageUpload },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                avatar: null,
                admin_role_id: false,
            }),
        };
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja criar um novo utilizador?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/utilizadores", {
                            onSuccess: () => {
                                this.showToast(
                                    "Utilizador criado com sucesso!"
                                );
                                this.showToast(
                                    "Password enviada por email ao utilizador.",
                                    "info"
                                );
                            },
                        });
                    }
                });
        },
        handleGoBack() {
            history.back();
            return false;
        },
        setImage(deliveredImage) {
            this.form.avatar = deliveredImage;
        },
    },
};
</script>

<style></style>
