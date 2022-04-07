<template>
    <div>
        <PageTitle titulo="Criar departamento" />

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group
                label="Designação do departamento:"
                label-for="name"
                description="Designação a atribuir ao departamento"
            >
                <b-form-input
                    id="name"
                    v-model="form.name"
                    type="text"
                    ref="name"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.name }"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Descrição do departamento:"
                label-for="name"
                description="Breve descrição do departamento"
            >
                <b-form-textarea
                    id="descricao"
                    v-model="form.descricao"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.descricao }"
                    rows="3"
                ></b-form-textarea>
                <b-form-invalid-feedback>
                    {{ form.errors.descricao }}
                </b-form-invalid-feedback>
            </b-form-group>


            <b-form-group
                label="Endereço do departamento:"
                label-for="address"
                description="Localização do departamento"
            >
            <AddressMap
                v-on:update="updateLocation($event)"
                :error="form.errors.address"
                :mapCenter="mapCenter"
            >
            </AddressMap>
            </b-form-group>
        </b-form>

        <WorkingPanelFooter>
            <template #cancel>
                <b-button @click="handleGoBack()">Cancelar</b-button>
            </template>

            <b-button
                variant="primary"
                :disabled="!form.isDirty || form.processing"
                :class="{ disabled: !can.create }"
                @click="handleOk()"
                ><div
                    class="spinner-border spinner-border-sm text-light"
                    role="status"
                    v-if="form.processing"
                >
                    <span></span>
                </div>
                Criar departamento</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import AddressMap from "@/shared/SingleAdressMap";

export default {
    components: {
        WorkingPanelFooter,
        ErrorAlert,
        AddressMap,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                descricao: null,
                address: false,
                latitude: false,
                longitude: false,
            }),
        };
    },
    props: {
        mapCenter: Object,
        can: Object
    },
    mounted() {
        this.$refs.name.focus();
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
                    text: "Tem a certeza que deseja criar um novo departamento?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.post("/config/departamentos", {
                            onSuccess: () => {
                                this.showToast("Departamento criado com sucesso!");
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
