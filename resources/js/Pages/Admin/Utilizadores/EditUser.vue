<template>
    <div>
        <PageTitle titulo="Editar utilizador" />

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
                    :imgSrc="userImage"
                    tooltip="Clique para carregar foto do utilizador"
                    @ImageCropped="setImage($event)"
                />
            </b-form-group>

            <b-form-group
                ><b-form-checkbox
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

        <hr />

        <b-row>
            <b-col md class="mb-1 mb-md-0"
                ><b-button
                    class="w-100"
                    variant="outline-info"
                    :disabled="form.processing"
                    @click="resetUserPassword()"
                    >Reenviar palavra passe</b-button
                ></b-col
            >
            <b-col md
                ><b-button
                    class="w-100"
                    variant="outline-danger"
                    :disabled="form.processing"
                    @click="deleteUser()"
                    >Eliminar utilizador</b-button
                ></b-col
            >
        </b-row>

        <WorkingPanelFooter>
            <template #cancel>
                <Link
                    as-button
                    :disabled="form.processing"
                    :href="'/utilizadores/' + utilizador.slug"
                    class="btn btn-secondary"
                    >Cancelar</Link
                >
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

export default {
    components: { WorkingPanelFooter, ImageUpload },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
                email: null,
                avatar: null,
                admin_role_id: false,
            }),
        };
    },
    props: {
        utilizador: Object,
    },
    mounted() {
        for (var key in this.utilizador) {
            this.form[key] = this.utilizador[key];
            this.form["avatar"] = null;
        }
    },
    computed: {
        userImage: function () {
            if (!this.utilizador.avatar) return "/images/johndoe.png";
            return "/utilizadores/" + this.utilizador.slug + "/displayImage";
        },
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que actualizar os dados do utilizador?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.put("/utilizadores/" + this.utilizador.slug, {
                            onSuccess: () => {
                                this.showToast(
                                    "Utilizador actualizado com sucesso!"
                                );
                            },
                        });
                    }
                });
        },
        deleteUser() {
            this.$swal
                .fire({
                    icon: "warning",
                    html:
                        "Tem a certeza que eliminar o utilizador " +
                        this.form.name +
                        "?<br><b>Não será possível reverter a acção!</b>",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete(
                            "/utilizadores/" + this.utilizador.slug,
                            {
                                onSuccess: () => {
                                    this.showToast(
                                        "Utilizador eliminado com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },
        resetUserPassword() {
            this.$swal
                .fire({
                    icon: "question",
                    html:
                        "Tem a certeza que deseja redfinir a palavra passe do utilizador " +
                        this.form.name +
                        "?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post(
                            "/utilizadores/" +
                                this.utilizador.slug +
                                "/resetPassword",
                            {
                                onSuccess: () => {
                                    this.showToast(
                                        "Password enviada por email ao utilizador.",
                                        "info"
                                    );
                                },
                            }
                        );
                    }
                });
        },
        setImage(deliveredImage) {
            this.form.avatar = deliveredImage;
        },
    },
};
</script>

<style></style>
