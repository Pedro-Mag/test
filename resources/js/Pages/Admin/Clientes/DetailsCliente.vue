<template>
    <div>
        <PageTitle titulo="Detalhes de cliente" />

        <b-card no-body class="border">
            <b-tabs card>
                <b-tab title="Base de dados" active>
                    <b-card-text>
                        <BaseDadosCliente :events="events" :cliente="cliente" :db="base_dados" :can="can"  v-on:reload="reload()"/>
                    </b-card-text>
                </b-tab>

                <b-tab title="Módulos" lazy>
                    <b-card-text>
                        <ModulesCliente
                            :cliente="cliente"
                            :modules="modules"
                            :own_modules="own_modules"
                            :can="can"
                        />
                    </b-card-text>
                </b-tab>

                <b-tab title="Eventos" lazy>
                    <b-card-text>
                        <ListaEventos
                            :events="events"
                        />
                    </b-card-text>
                </b-tab>
            </b-tabs>
        </b-card>

        <WorkingPanelFooter class="mt-3">
            <Link as-button class="btn btn-secondary" href="/clientes">
                Voltar
            </Link>
        </WorkingPanelFooter>

    </div>
</template>

<script>
import BaseDadosCliente from "./BaseDadosCliente";
import ModulesCliente from "./ModulesCliente";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter"
import ListaEventos from "./ListaEventos";
import { Inertia } from '@inertiajs/inertia'

export default {
    components: { BaseDadosCliente, ModulesCliente, WorkingPanelFooter, ListaEventos },
    data: function () {
        return {};
    },
    props: {
        base_dados: Object,
        cliente: Object,
        events: Array,
        modules: Array,
        own_modules: Array,
        can: Object
    },
    methods: {
        reload() {
            console.log('reloading')
            Inertia.reload({ only: ['base_dados'] })
        }
    }
};
</script>

<style></style>
