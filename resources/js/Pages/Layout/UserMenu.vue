<template>
    <div v-b-hover="hoverHandler">
        <b-dropdown
            variant="link"
            right
            toggle-class="text-decoration-none p-0"
            no-caret
            ref="dropdown"
        >
            <template #button-content>
                <img :src="user.avatar" width="40px" class="rounded-circle" />
            </template>
            <b-dropdown-text class="text-center py-0"
                ><small
                    ><em>
                        {{ user.name }}
                    </em></small
                ></b-dropdown-text
            >
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-form
                ><Link href="/logged" class="text-reset"
                    ><Icon mdi="account-edit" class="mr-2" /> Meu perfil</Link
                ></b-dropdown-form
            >
            <b-dropdown-form disabled
                ><Link href="#" class="text-reset"
                    ><Icon mdi="cog" class="mr-2" /> Definições</Link
                ></b-dropdown-form
            >
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-item
                ><b-button @click="logout" variant="secondary" size="sm">
                    Terminar sessão
                </b-button></b-dropdown-item
            >
        </b-dropdown>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {},
        };
    },
    watch: {
        "$store.state.user": function () {
            this.user = this.$store.state.user;
        },
    },
    methods: {
        hoverHandler(isHovered) {
            if (isHovered) {
                this.$refs.dropdown.visible = true;
            } else {
                this.$refs.dropdown.visible = false;
            }
        },
        logout() {
            this.$inertia.post("/logout");
        },
    },
};
</script>

<style></style>
