<template>
    <div>

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
        <PageTitle titulo="Criar utilizador" />
            <b-row>
                <b-col order="2" order-lg="1">
                    <b-form-group
                        label="Nome e apelido:"
                        label-for="name"
                        description="Nome e apelido, no minimo."
                    >
                        <b-form-input
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Inserir nome e apelido..."
                            :class="{ 'is-invalid': form.errors.name }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.name }}
                        </b-form-invalid-feedback>
                    </b-form-group>

                    <b-form-group
                        label="Endereço de correio electrónico:"
                        label-for="email"
                        description="Endereço de email empresarial."
                    >
                        <b-form-input
                            id="email"
                            v-model="form.email"
                            type="text"
                            placeholder="Inserir endereço de email..."
                            :class="{ 'is-invalid': form.errors.email }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.email }}
                        </b-form-invalid-feedback>
                    </b-form-group>

                    <b-form-checkbox v-model="form.rgpd" switch class="mb-3">
                        Autorização para visualizar/editar dados pessoais.
                    </b-form-checkbox>

                    <b-form-checkbox v-model="form.gestor" switch class="mb-3">
                        Gestor de obras.
                    </b-form-checkbox>
                </b-col>
                <b-col lg="auto" order="1" order-lg="2">
                    <b-form-group label="Avatar:" label-for="avatar">
                        <ImageUpload
                            class="text-center mx-lg-5"
                            width="250px"
                            @ImageCropped="setImage($event)"
                            tooltip="Clique para carregar foto do utilizador"
                        />
                    </b-form-group>
                </b-col>
            </b-row>

            <b-form-group
                label="Grupo do utilizador:"
                label-for="main_user_group_id"
            >
                <SimpleSelect
                    id="main_user_group_id"
                    :options="userGroups"
                    v-bind:selectedId="form.main_user_group_id"
                    v-on:update="form.main_user_group_id = $event"
                />
            </b-form-group>

            <hr />

            <b-form-group
                label="Permissões por departamento:"
                label-for="main_departamentos"
            >
                <MultiSelect
                    id="main_departamentos"
                    :options="departamentos"
                    v-bind:selectedId="form.main_departamentos"
                    v-on:update="form.main_departamentos = $event"
                />
            </b-form-group>

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
        </b-form>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import ImageUpload from "@/Shared/ImageUpload";
import SimpleSelect from "@/Shared/SimpleSelect";
import MultiSelect from "@/Shared/MultiSelect";

export default {
    components: {
        WorkingPanelFooter,
        ImageUpload,
        ErrorAlert,
        SimpleSelect,
        MultiSelect,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                avatar: null,
                rgpd: false,
                gestor: false,
                main_user_group_id: null,
                main_departamentos: [],
            }),
        };
    },
    props: {
        userGroups: Array,
        departamentos: Array,
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
                        this.form.post("/config/utilizadores", {
                            onSuccess: () => {
                                this.showToast(
                                    "Utilizador criado com sucesso!"
                                );
                                setTimeout(() => {
                                    this.showToast(
                                        "Password enviada por email ao utilizador.",
                                        "info"
                                    );
                                }, 1500);
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
