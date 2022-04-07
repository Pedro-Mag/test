<template>
    <div>
        <b-row class="d-flex align-items-center mb-2">
            <b-col><label>Eventos associados ao cliente:</label></b-col>
            <b-col md="auto"
                ><div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        v-model="filter"
                        placeholder="Procurar..."
                    /></div
            ></b-col>
        </b-row>
        <div>
            <b-table
                id="events-table"
                hover
                small
                responsive
                show-empty
                :items="events"
                :fields="fields"
                :filter="filter"
                :per-page="perPage"
                :current-page="currentPage"
                sort-by="date"
                sort-desc="true"
            >
                <template #cell(user_name)="data">
                    <b-avatar
                        :src="data.item.userThumb"
                        size="sm"
                        class="mr-2"
                    ></b-avatar>
                    <span>{{ data.item.userName }}</span>
                </template>
                <template #empty="scope"
                    ><small> Nenhum evento registado... </small></template
                >
            </b-table>

            <b-pagination
                v-if="perPage / rows < 1"
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                aria-controls="events-table"
                align="right"
            ></b-pagination>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            filter: "",
            fields: [
                {
                    key: "event",
                    label: "Evento",
                    sortable: true,
                    class: "align-middle",
                },
                {
                    key: "date",
                    label: "Data",
                    sortable: true,
                    class: "align-middle",
                },
                {
                    key: "user_name",
                    label: "Responsável",
                },
            ],
            perPage: 10,
            currentPage: 1,
        };
    },
    computed: {
        rows() {
            return this.events.length;
        },
    },
    props: {
        events: Array,
    },
};
</script>

<style></style>
