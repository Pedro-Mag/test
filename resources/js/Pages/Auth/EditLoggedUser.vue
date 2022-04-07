<template>
    <div>
        <PageTitle titulo="O meu perfil" />

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
                <ImageUpload
                    :imgSrc="utilizador.avatar"
                    @ImageCropped="setImage($event)"
                />
            </b-form-group>
            <hr />

            <b-form-group
                ><b-row>
                    <b-col
                        ><label for="password">Alterar password:</label
                        ><b-form-input
                            id="password"
                            v-model="form.password"
                            type="password"
                            placeholder="Introduza a password pretendida"
                            :class="{ 'is-invalid': form.errors.password }"
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.password }}.
                        </b-form-invalid-feedback></b-col
                    >
                    <b-col
                        ><label for="password_confirmation"
                            >Confirmar nova password:</label
                        >
                        <b-form-input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            placeholder="Reinsira a password pretendida"
                            :class="{ 'is-invalid': form.errors.password }"
                        ></b-form-input
                    ></b-col>
                </b-row>
            </b-form-group>
        </b-form>

        <WorkingPanelFooter>
            <template #cancel>
                <b-button
                    variant="secondary"
                    class="px-4"
                    :disabled="form.processing"
                    @click="handleCancel()"
                >
                    Voltar
                </b-button>
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
                Salvar alterações</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import ImageUpload from "@/Shared/ImageUpload";
import axios from "axios";

export default {
    components: { WorkingPanelFooter, ImageUpload },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
                avatar: null,
            }),
        };
    },
    props: {
        utilizador: Object,
    },
    mounted() {
        this.form.name = this.utilizador.name;
        this.form.email = this.utilizador.email;
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que actualizar os seus dados?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/logged", {
                            onSuccess: () => {
                                axios.get("/session/user").then((response) => {
                                    this.$store.commit(
                                        "setUser",
                                        response.data
                                    );
                                });
                                this.showToast(
                                    "Dados actualizados com sucesso!"
                                );
                            },
                        });
                    }
                });
        },
        setImage(deliveredImage) {
            this.form.avatar = deliveredImage;
        },
        handleCancel() {
            history.go(-1);
        },
    },
};
</script>

<style></style>
