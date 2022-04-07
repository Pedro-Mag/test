<template>
    <div>
        <PageTitle titulo="Editar utilizador" />

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
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
                            :disabled="!can.edit"
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
                            :disabled="!can.edit"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.email }}
                        </b-form-invalid-feedback>
                    </b-form-group>

                    <b-form-checkbox
                        v-model="form.rgpd"
                        :disabled="!can.edit"
                        switch
                        class="mb-3"
                    >
                        Autorização para visualizar/editar dados pessoais.
                    </b-form-checkbox>

                    <b-form-checkbox
                        v-model="form.gestor"
                        :disabled="!can.edit"
                        switch
                        class="mb-3"
                    >
                        Gestor de obras.
                    </b-form-checkbox>
                </b-col>
                <b-col lg="auto" order="1" order-lg="2">
                    <b-form-group label="Avatar:" label-for="avatar">
                        <ImageUpload
                            v-if="can.edit"
                            :imgSrc="user.avatar"
                            width="250px"
                            class="text-center mx-lg-5"
                            @ImageCropped="setImage($event)"
                            tooltip="Clique para carregar foto do utilizador"
                        />
                        <b-img v-else :src="user.avatar" rounded="circle" width="250px" />
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
                    :disabled="!can.edit"
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
                    :disabled="!can.edit"
                    v-bind:selectedIds="form.main_departamentos"
                    v-on:update="form.main_departamentos = $event"
                />
            </b-form-group>
        </b-form>

        <hr />

        <b-form-group label="Configurar permissões:">
            <b-card id="permissoes">
                <Permissoes
                    :permissoes="permissoes"
                    class="permissoes"
                    :disabled="!can.edit"
                    v-on:checkBoxChange="changeValue($event)"
                />
            </b-card>
        </b-form-group>

        <hr />

        <b-row>
            <b-col md="6" class="mb-2 mb-md-0">
                <b-button
                    variant="outline-info"
                    class="w-100"
                    @click="resetUserPassword()"
                    :disabled="!can.edit"
                >
                    Reenviar palavra passe
                </b-button>
            </b-col>
            <b-col md="6">
                <b-button
                    :disabled="!can.delete"
                    variant="outline-danger"
                    class="w-100"
                    @click="deleteUser()"
                >
                    Eliminar utilizador
                </b-button>
            </b-col>
        </b-row>

        <WorkingPanelFooter>
            <template #cancel>
                <Link
                    as-button
                    href="/config/utilizadores"
                    class="btn btn-secondary"
                    >Voltar</Link
                >
            </template>

            <b-button
                variant="primary"
                v-if="can.edit"
                :disabled="!form.isDirty || form.processing"
                @click="handleOk()"
                ><div
                    class="spinner-border spinner-border-sm text-light"
                    role="status"
                    v-if="form.processing"
                >
                    <span></span>
                </div>
                Actualizar utilizador</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import ImageUpload from "@/Shared/ImageUpload";
import SimpleSelect from "@/Shared/SimpleSelect";
import MultiSelect from "@/Shared/MultiSelect";
import Permissoes from "../Permissoes";

export default {
    components: {
        WorkingPanelFooter,
        ImageUpload,
        ErrorAlert,
        SimpleSelect,
        MultiSelect,
        Permissoes,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
                email: null,
                avatar: null,
                rgpd: null,
                gestor: null,
                main_user_group_id: null,
                main_departamentos: null,
            }),
        };
    },
    props: {
        departamentos: Array,
        userGroups: Array,
        permissoes: Array,
        user: Object,
        can: Object,
    },
    mounted() {
        this.form.id = this.user.id;
        this.form.name = this.user.name;
        this.form.email = this.user.email;
        this.form.gestor = !!this.user.gestor;
        this.form.rgpd = !!this.user.rgpd;
        this.form.main_user_group_id = this.user.main_user_group_id;
        this.form.main_departamentos = this.user.main_departamentos;
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja actualizar o utilizador?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.put(
                            `/config/utilizadores/${this.user.slug}`,
                            {
                                onSuccess: () => {
                                    this.showToast(
                                        "Utilizador actualizado com sucesso!"
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
                            "/config/utilizadores/" +
                                this.user.slug +
                                "/resetpassword",
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
        changeValue(event) {
            this.$inertia.post(
                `/config/utilizadores/${this.user.slug}/permissao`,
                { id: event.id, value: event.value },
                {
                    only: ["permissoes"],
                    preserveState: true,
                    preserveScroll: true,
                    onSuccess: () => {
                        this.showToast("Permissões actualizadas com sucesso!");
                    },
                }
            );
        },
        deleteUser() {
            this.$swal
                .fire({
                    icon: "warning",
                    html:
                        "Tem a certeza que deseja eliminar o utilizador '" +
                        this.form.name +
                        "'?<br>A eliminação será irreversível!",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete(
                            `/config/utilizadores/${this.user.slug}`,
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
        setImage(deliveredImage) {
            this.form.avatar = deliveredImage;
        },
    },
};
</script>

<style></style>
