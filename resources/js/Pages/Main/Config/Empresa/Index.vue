<template>
    <div>
        <PageTitle titulo="Dados da empresa" />

        <ErrorAlert :errors="form.errors" />

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
                    :disabled="!can.edit"
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
                            :disabled="!can.edit"
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
                        description="Termo utilizado para aceder à conta do cliente"
                    >
                        <b-form-input
                            v-model="empresa.account"
                            disabled
                        ></b-form-input>
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
                            v-if="can.edit"
                            :imgSrc="empresa.image"
                            @ImageCropped="setImage($event)"
                            width="250px"
                        />
                        <b-img
                            v-else
                            :src="empresa.image"
                            rounded="circle"
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
                            :disabled="!can.edit"
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
                            :disabled="!can.edit"
                            required
                        ></b-form-input>
                        <b-form-invalid-feedback>
                            {{ form.errors.contact }}.
                        </b-form-invalid-feedback>
                    </b-form-group>

                    <b-form-group
                        label="Número de identificação fiscal:"
                        description="Número de identificação fiscal da entidade"
                    >
                        <b-form-input
                            v-model="empresa.nif"
                            type="tel"
                            disabled
                        ></b-form-input>
                    </b-form-group>
                </div>
            </div>

            <b-form-group>
                <ClientLocationMap
                    :currentAddress="empresa.address"
                    :currentLat="empresa.latitude"
                    :currentLng="empresa.longitude"
                    v-on:update="updateLocation($event)"
                    :error="form.errors.address"
                    :disabled="!can.edit"
                >
                </ClientLocationMap>
            </b-form-group>
        </b-form>

        <WorkingPanelFooter>
            <template #cancel>
                <Link as-button class="btn btn-secondary" href="/config">Voltar</Link>
            </template>
            <b-button
                v-if="can.edit"
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
import ErrorAlert from "@/Shared/ErrorAlert";
import ImageUpload from "@/Shared/ImageUpload";
import ClientLocationMap from "@/shared/SingleAdressMap";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";

export default {
    components: {
        ErrorAlert,
        ImageUpload,
        ClientLocationMap,
        WorkingPanelFooter,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
                designacao: null,
                contact: null,
                email: null,
                address: null,
                latitude: null,
                longitude: null,
                image: null,
            }),
        };
    },
    props: {
        empresa: Object,
        can: Object,
    },
    mounted() {
        this.form.id = this.empresa.id;
        this.form.name = this.empresa.name;
        this.form.designacao = this.empresa.designacao;
        this.form.contact = this.empresa.contact;
        this.form.email = this.empresa.email;
    },
    methods: {
        updateLocation(location) {
            this.form.address = location.address;
            this.form.latitude = location.lat;
            this.form.longitude = location.lng;
        },
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que alterar os dados da empresa?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/config/empresa", {
                            onSuccess: () => {
                                this.showToast(
                                    "Dados actualizados com sucesso!"
                                );
                            },
                        });
                    }
                });
        },
        setImage(deliveredImage) {
            this.form.image = deliveredImage;
        },
    },
};
</script>

<style>
form input:disabled {
    cursor: not-allowed;
}
</style>
