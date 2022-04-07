<template>
    <div>
        <PageTitle titulo="Ver cliente" />
        <b-form-group label="Designação comercial completa:">
            <div class="form-control overflow-hidden">
                {{ cliente.designacao }}
            </div>
        </b-form-group>
        <div class="row">
            <div class="col-lg-4">
                <b-form-group label="Designação comercial:">
                    <div class="form-control overflow-hidden">
                        {{ cliente.name }}
                    </div>
                </b-form-group>
            </div>
            <div class="col-lg-8">
                <b-form-group label="Nome da conta:">
                    <div class="form-control overflow-hidden">
                        {{ cliente.account }}
                    </div>
                </b-form-group>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <b-form-group label="Imagem constitucional:">
                    <div class="w-100 text-center">
                        <img
                            style="height: 250px; border-radius: 100%"
                            :src="cliente.realImage"
                        />
                    </div>
                </b-form-group>
            </div>
            <div class="col-lg-8">
                <b-form-group label="Endereço de email:">
                    <div class="form-control overflow-hidden">
                        {{ cliente.email }}
                    </div>
                </b-form-group>

                <b-form-group label="Contacto telefónico:">
                    <div class="form-control overflow-hidden">
                        {{ cliente.contact }}
                    </div>
                </b-form-group>

                <b-form-group label="Número de identificação fiscal:">
                    <div class="form-control overflow-hidden">
                        {{ cliente.nif }}
                    </div>
                </b-form-group>
            </div>
        </div>

        <b-form-group>
            <ClientLocationMap
                :editable="false"
                :currentAddress="cliente.address"
                :currentLat="cliente.latitude"
                :currentLng="cliente.longitude"
            >
            </ClientLocationMap>
        </b-form-group>

        <hr />

        <b-form-group label="Gestor de conta:">
            <div class="form-control overflow-hidden">
                <img class="select-thumb" :src="owner.thumbnail" />
                {{ owner.name }}
            </div>
        </b-form-group>

        <hr />

        <b-form-group label="Status da conta:">
            <div class="form-control">
                {{ cliente.status ? 'Activo' : 'Suspenso' }}
            </div>
        </b-form-group>

        <WorkingPanelFooter>
            <template #cancel>
                <Link as-button href="/clientes/" class="btn btn-secondary">
                    Voltar atrás
                </Link>
            </template>

            <template #extra>
                <Link
                    as-button
                    :href="'/clientes/' + cliente.slug + '/detalhes'"
                    class="btn btn-outline-primary"
                    v-if="can.edit"
                >
                    Detalhes
                </Link>
            </template>

            <Link
                as-button
                :href="'/clientes/' + cliente.slug + '/editar'"
                class="btn btn-primary"
                v-if="can.edit"
            >
                Editar cliente</Link
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import ClientLocationMap from "@/shared/SingleAdressMap";

export default {
    components: {
        WorkingPanelFooter,
        ClientLocationMap,
    },
    data() {
        return {};
    },
    props: {
        cliente: Object,
        owner: Object,
        can: Object,
    },
    methods: {
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
