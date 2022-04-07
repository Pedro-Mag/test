<template>
    <div>
        <PageTitle titulo="Editar departamento" />

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
                    :disabled="!can.edit"
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
                    :disabled="!can.edit"
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
                    :currentAddress="departamento.address"
                    :currentLat="departamento.latitude"
                    :currentLng="departamento.longitude"
                    :error="form.errors.address"
                    :disabled="!can.edit"
                >
                </AddressMap>
            </b-form-group>
        </b-form>

        <hr />

        <b-button
            variant="outline-danger"
            @click="deleteGroup()"
            class="w-100"
            :disabled="!can.delete"
            >Eliminar departamento</b-button
        >

        <WorkingPanelFooter>
            <template #cancel>
                <b-button @click="handleGoBack()">Voltar</b-button>
            </template>

            <b-button
                variant="primary"
                :disabled="!form.isDirty || form.processing"
                v-if="can.edit"
                @click="handleOk()"
                ><div
                    class="spinner-border spinner-border-sm text-light"
                    role="status"
                    v-if="form.processing"
                >
                    <span></span>
                </div>
                Actualizar alterações</b-button
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
                id: null,
                name: null,
                descricao: null,
                address: false,
                latitude: false,
                longitude: false,
            }),
        };
    },
    props: {
        departamento: Object,
        can: Object,
    },
    mounted() {
        this.$refs.name.focus();
        this.form.id = this.departamento.id;
        this.form.name = this.departamento.name;
        this.form.descricao = this.departamento.descricao;
        this.form.address = this.departamento.address;
        this.form.latitude = this.departamento.latitude;
        this.form.longitude = this.departamento.longitude;
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
                    text: "Tem a certeza que deseja actualizar o departamento?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.put(
                            `/config/departamentos/${this.departamento.slug}`,
                            {
                                onSuccess: () => {
                                    this.showToast(
                                        "Departamento actualizado com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },

        deleteGroup() {
            this.$swal
                .fire({
                    icon: "warning",
                    html:
                        "Tem a certeza que deseja eliminar o departamento '" +
                        this.form.name +
                        "'?<br>A eliminação será irreversível!",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete(
                            `/config/departamentos/${this.departamento.slug}`,
                            {
                                onError: (errors) => {
                                    this.showToast(errors.delete, "danger");
                                },
                                onSuccess: () => {
                                    this.showToast(
                                        "Departamento eliminado com sucesso!"
                                    );
                                },
                            }
                        );
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
