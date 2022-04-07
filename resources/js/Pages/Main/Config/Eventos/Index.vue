<template>
    <div>
        <PageTitle titulo="Visualizar eventos" />

        <b-row align-h="end" class="mb-3">
            <b-col sm class="col-md-auto">
                <div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        v-model="search"
                        placeholder="Procurar..."
                    />
                </div>
            </b-col>
        </b-row>

        <b-table
            hover
            show-empty
            :items="events.data"
            :fields="fields"
            thead-class="text-uppercase text-secondary fw-bolder small opacity-75"
        >
            <template #empty="scope">
                <p>Sem dados para apresentar...</p>
            </template>
            <template #emptyfiltered="scope">
                <p>Não há registros correspondentes ao termo de procura...</p>
            </template>
            <template #cell(date)="data">
                <div>
                    <Icon mdi="calendar-today" /> {{ data.item.date.day }}
                </div>
                <div>
                    <Icon mdi="clock-outline" /> {{ data.item.date.hour }}
                </div>
            </template>
            <template #cell(user)="data">
                <Link v-if="data.item.user.can" :href="data.item.user.href">{{
                    data.item.user.name
                }}</Link>
                <span v-else>{{ data.item.user.name }}</span>
            </template>
            <template #cell(object)="data">
                <Link
                    v-if="data.item.object.can"
                    :href="data.item.object.href"
                    >{{ data.item.object.name }}</Link
                >
                <span v-else>{{ data.item.object.name }}</span>
            </template>
        </b-table>

        <Paginator v-if="events.last_page > 1" :links="events.links" />
    </div>
</template>

<script>
import Paginator from "@/Shared/Pagination";
import { debounce } from "lodash";

export default {
    components: {
        Paginator,
    },
    data() {
        return {
            search: null,
            fields: [
                {
                    key: "date",
                    label: "Data",
                    tdClass: "small",
                },
                {
                    key: "user",
                    label: "Utilizador",
                    tdClass: "align-middle",
                },
                {
                    key: "action",
                    label: "Acção",
                    tdClass: "align-middle",
                },
                {
                    key: "object",
                    label: "Objecto",
                    tdClass: "align-middle",
                },
            ],
        };
    },
    props: {
        events: Object,
        filters: Array,
    },
    watch: {
        search: debounce(function (value) {
            this.$inertia.get(
                "/config/eventos",
                { search: value },
                { preserveState: true, replace: true }
            );
        }),
    },
};
</script>

<style></style>
