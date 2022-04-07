<template>
    <div>
        <PageTitle titulo="Utilizadores" />

        <b-row align-h="between">
            <b-col sm class="col-md-auto mb-1 mb-md-0"
                ><Link
                    href="/utilizadores/criar"
                    class="btn btn-outline-primary w-100"
                    :class="{'disabled': !this.can.edit}"
                    role="button"
                    as-button

                >
                    Novo utilizador
                </Link>
            </b-col>
            <b-col sm class="col-md-auto">
                <div class="input-group mb-3 w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-magnify"></span>
                    </div>
                    <input
                        type="text"
                        v-model="search"
                        class="form-control"
                        placeholder="Procurar..."
                    />
                </div>
            </b-col>
        </b-row>

        <div class="table-responsive p-0 mb-3" id="admin-user-table">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th
                            class="text-uppercase text-secondary fw-bolder small opacity-75"
                        >
                            Nome
                        </th>

                        <th
                            class="text-uppercase text-secondary fw-bolder small opacity-75 text-center"
                        >
                            Permissão
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="position-relative"
                        v-for="utilizador in utilizadores.data"
                        :key="utilizador.id"
                    >
                        <td>
                            <div class="d-flex px-2 py-1 align-items-center">
                                <div class="mr-3">
                                    <b-avatar v-if="utilizador.thumbnail" :src="utilizador.thumbnail"/>
                                    <b-avatar v-else :text="utilizador.iniciais"/>
                                </div>
                                <div
                                    class="d-flex flex-column justify-content-center"
                                >
                                    <h6 class="mb-0">{{ utilizador.name }}</h6>
                                    <Link
                                        :href="
                                            '/utilizadores/' + utilizador.slug
                                        "
                                        class="small text-secondary mb-0 stretched-link"
                                    >
                                        {{ utilizador.email }}
                                    </Link>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center small">
                            <h6 class="m-0">
                                <b-badge
                                    pill
                                    class="px-2 py-1"
                                    :variant="
                                        adminBadge(utilizador.admin_role_id)
                                    "
                                    >{{ utilizador.admin_design }}</b-badge
                                >
                            </h6>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <Paginator :links="utilizadores.links" />
    </div>
</template>

<script>
import Paginator from "@/Shared/Pagination";
import { debounce } from "lodash";

export default {
    components: { Paginator },
    data: function () {
        return {
            search: this.filters.search,
        };
    },
    props: {
        utilizadores: Object,
        filters: Object,
        can: Object
    },
    watch: {
        search: debounce(function (value) {
            this.$inertia.get(
                "/utilizadores",
                { search: value },
                { preserveState: true, replace: true }
            );
        }),
    },
    methods: {
        adminBadge(admin_role_id) {
            if (admin_role_id == 2) return "info";
            return "warning";
        },
    }
};
</script>

<style>
.avatar-sm {
    width: 36px !important;
    height: 36px !important;
    font-size: 0.875rem;
}

.b-avatar {
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.75rem !important;
    height: 48px !important;
    width: 48px !important;
    transition: all 0.2s ease-in-out;
    border: #6C757D solid 1px;
}
</style>
