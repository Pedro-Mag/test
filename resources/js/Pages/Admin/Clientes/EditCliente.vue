<template>
    <div>
        <PageTitle titulo="Editar Cliente" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Designação comercial completa:"
                label-for="designacao"
                description="Identificação oficial da entidade"
            >
                <b-form-input
                    id="designacao"
                    v-model="form.designacao"
                    type="text"
                    placeholder="Inserir designação comercial completa..."
                    :class="{ 'is-invalid': form.errors.designacao }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.designacao }}
                </b-form-invalid-feedback>
            </b-form-group>
            <div class="row">
                <div class="col-lg-4">
                    <b-form-group
                        label="Designação comercial:"
                        label-for="name"
                        description="Texto curto que identifica a entidade"
                    >
                        <b-form-input
                            ref="name"
                            id="name"
                            v-model="form.name"
                            type="text"
                            placeholder="Inserir designação comercial..."
                            :class="{ 'is-invalid': form.errors.name }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.name }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </div>
                <div class="col-lg-8">
                    <b-form-group
                        label="Designação da conta:"
                        label-for="account"
                        description="Termo utilizado para aceder à conta do cliente"
                    >
                        <b-form-input
                            ref="account"
                            id="account"
                            v-model="form.account"
                            type="text"
                            placeholder="Inserir designação da conta..."
                            :class="{ 'is-invalid': form.errors.account }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.account }}
                        </b-form-invalid-feedback>
                    </b-form-group>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <b-form-group
                        label="Imagem constitucional:"
                        label-for="avatar"
                        description="Logo da entidade"
                    >
                        <ImageUpload
                            :imgSrc="cliente.realImage"
                            @ImageCropped="setImage($event)"
                            width="250px"
                        />
                    </b-form-group>
                </div>
                <div class="col-lg-8">
                    <b-form-group
                        label="Endereço de email:"
                        label-for="email"
                        description="Email do contacto directo no cliente"
                    >
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

                    <b-form-group
                        label="Contacto telefónico:"
                        label-for="contact"
                        description="Numero de telefone do contacto no cliente"
                    >
                        <b-form-input
                            id="contact"
                            v-model="form.contact"
                            type="tel"
                            placeholder="Inserir contacto telefónico..."
                            :class="{ 'is-invalid': form.errors.contact }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.contact }}.
                        </b-form-invalid-feedback>
                    </b-form-group>

                    <b-form-group
                        label="Número de identificação fiscal:"
                        label-for="nif"
                        description="Número de identificação fiscal da entidade"
                    >
                        <b-form-input
                            id="nif"
                            v-model="form.nif"
                            type="tel"
                            placeholder="Inserir nif..."
                            :class="{ 'is-invalid': form.errors.nif }"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.nif }}.
                        </b-form-invalid-feedback>
                    </b-form-group>
                </div>
            </div>

            <b-form-group>
                <ClientLocationMap
                    :currentAddress="cliente.address"
                    :currentLat="cliente.latitude"
                    :currentLng="cliente.longitude"
                    v-on:update="updateLocation($event)"
                    :error="form.errors.address"
                >
                </ClientLocationMap>
            </b-form-group>

            <hr />

            <b-form-group
                label="Gestor de conta:"
                description="Utilizador do Sigo que gere a conta deste cliente"
            >
                <PersonSelect
                    :options="admin_users"
                    v-bind:selectedId="form.admin_user_id"
                    v-on:update="form.admin_user_id = $event"
                />
                <div
                    v-if="form.errors.admin_user_id"
                    class="invalid-feedback d-block"
                >
                    {{ form.errors.admin_user_id }}.
                </div>
            </b-form-group>
        </b-form>

        <hr />

        <b-form-checkbox v-model="form.status" switch>
            Status do cliente <small>[ {{ form.status ? 'Activo' : 'Suspenso' }} ]</small>
        </b-form-checkbox>

        <WorkingPanelFooter>
            <template #cancel>
                <b-button @click="handleGoBack()">Cancelar</b-button>
            </template>

            <template #extra>
                <b-button variant="outline-danger" @click="deleteCliente"
                    >Eliminar cliente</b-button
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
import ImageUpload from "@/Shared/ImageUpload";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import PersonSelect from "@/shared/PersonSelect";
import ClientLocationMap from "@/shared/SingleAdressMap";

export default {
    components: {
        ImageUpload,
        WorkingPanelFooter,
        PersonSelect,
        ClientLocationMap,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
                account: null,
                designacao: null,
                contact: null,
                email: null,
                address: null,
                latitude: null,
                longitude: null,
                nif: null,
                status: null,
                admin_user_id: null,
                image: null,
            }),
        };
    },
    props: {
        cliente: Object,
        admin_users: Array,
    },
    mounted() {
        this.$refs.name.focus();
        for (var key in this.cliente) {
            this.form[key] = this.cliente[key];
        }
        this.form.status = !!this.form.status;
    },
    methods: {
        updateLocation(location) {
            this.form.address = location.address;
            this.form.latitude = location.lat;
            this.form.longitude = location.lng;
        },
        setImage(deliveredImage) {
            this.form.image = deliveredImage;
        },
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja salvar as alterações ao cliente?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.put(`/clientes/${this.cliente.slug}`, {
                            onSuccess: () => {
                                this.showToast(
                                    "Alterações ao cliente salvas com sucesso!"
                                );
                            },
                        });
                    }
                });
        },
        deleteCliente() {
            this.$swal
                .fire({
                    icon: "warning",
                    html:
                        "Tem a certeza que eliminar o cliente " +
                        this.form.name +
                        "?<br><b>Não será possível reverter a acção!</b>",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete("/clientes/" + this.cliente.slug, {
                            onSuccess: () => {
                                this.showToast(
                                    "Cliente eliminado com sucesso!"
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
    },
};
</script>

<style>
.select-thumb {
    height: 22px;
    border-radius: 100%;
}
</style>
