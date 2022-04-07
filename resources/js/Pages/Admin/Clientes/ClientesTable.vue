<template>
    <div class="table-responsive p-0 mb-3 clientes-table">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th
                        class="text-uppercase text-secondary fw-bolder small opacity-75"
                    >
                        Designação
                    </th>

                    <th
                        class="d-none d-md-table-cell text-uppercase text-secondary fw-bolder small opacity-75"
                    >
                        Nome da conta
                    </th>
                    <th
                        class="d-none d-md-table-cell text-uppercase text-secondary fw-bolder small opacity-75"
                    >
                        Gestor
                    </th>
                    <th
                        class="d-none d-md-table-cell text-uppercase text-secondary fw-bolder small opacity-75"
                    >Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cliente in clientes" :key="cliente.id">
                    <td class="position-relative">
                        <div class="d-flex px-2 py-1 align-items-center">
                            <div class="mr-3">
                                <b-avatar
                                    v-if="cliente.thumbnail"
                                    :src="cliente.thumbnail"
                                />
                                <b-avatar v-else>{{ cliente.name }}</b-avatar>
                            </div>
                            <div
                                class="d-flex flex-column justify-content-center"
                            >
                                <h6 class="mb-0">
                                    {{ cliente.name }}
                                </h6>
                                <Link
                                    :href="'/clientes/' + cliente.slug"
                                    class="small text-secondary mb-0 stretched-link"
                                >
                                    {{ cliente.designacao }}
                                </Link>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle small d-none d-md-table-cell">
                        {{ cliente.account }}
                    </td>
                    <td class="d-none d-md-table-cell align-middle text-center small">
                        <h6 class="m-0" v-if="cliente.owner">
                            <b-badge pill class="px-2 py-1" variant="primary"
                                >Gestor</b-badge
                            >
                        </h6>
                        <h6 class="m-0" v-else>
                            <b-badge pill class="px-2 py-1" variant="secondary"
                                ><Link class="text-decoration-none text-white" :href="'/utilizadores/' + cliente.owner_slug">{{ cliente.owner_iniciais }}</Link></b-badge
                            >
                        </h6>
                    </td>
                    <td class="align-middle text-center">
                        <h6 class="m-0">
                            <b-badge pill class="px-2 py-1" :variant="cliente.status ? 'info' : 'danger'"
                                >{{ cliente.status_text }}</b-badge
                            >
                        </h6>
                    </td>
                    <td class="align-middle text-center">
                        <Link
                            :href="'/clientes/' + cliente.slug + '/detalhes'"
                            class="small mb-0"
                            v-b-tooltip.hover title="Ver detalhes"
                            ><Icon mdi="card-account-details" size="md" /></Link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        clientes: Array,
    },
};
</script>

<style></style>
