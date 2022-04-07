<template>
    <div>
        <PageTitle titulo="Detalhes de utilizador" />

        <div class="form-group">
            <label>Nome:</label>
            <div class="form-control" type="text">
                {{ utilizador.name }}
            </div>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <div class="form-control" type="text">
                {{ utilizador.email }}
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <b-img
                rounded="circle"
                :src="userImage"
                alt="Responsive image"
                id="avatar"
            ></b-img>
        </div>

        <hr />

        <div class="d-flex justify-content-center">
            <h5>
                <b-badge :variant="adminBadge" class="px-3 py-2">
                    <Span
                        class="font-weight-bold"
                        v-if="utilizador.admin_role_id == 1"
                        >Tem</Span
                    >
                    <Span class="font-weight-bold" v-else>Não tem</Span>
                    privilégios de administrador
                </b-badge>
            </h5>
        </div>

        <WorkingPanelFooter>
            <template #cancel>
                <Link as-button href="/utilizadores" class="btn btn-secondary"
                    >Voltar</Link
                >
            </template>

            <Link
                as-button
                :href="'/utilizadores/' + utilizador.slug + '/editar'"
                class="btn btn-primary"
                v-if="can.edit"
            >
                Editar utilizador</Link
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";

export default {
    components: { WorkingPanelFooter },
    computed: {
        adminBadge: function () {
            let adminBadge = "info";
            if (this.utilizador.admin_role_id == 1) adminBadge = "warning";

            return adminBadge;
        },
        userImage: function () {
            if (!this.utilizador.avatar) return "/images/johndoe.png";
            return "/utilizadores/" + this.utilizador.slug + "/displayImage?"  + Math.random();
        }
    },
    props: {
        utilizador: {
            name: {
                default: "",
                type: String,
            },
        },
        can: Object
    },
};
</script>

<style>
#avatar {
    width: 300px;
}
</style>
