<template>
    <div class="container-fluid">
        <Sidebar :sessionType="sessionType" />

        <main>
            <Navbar />

            <div class="content container-fluid px-0 px-md-2 ">
                <div class="card mt-3">
                    <div class="card-body px-3 px-md-4 pt-3 pt-md-4 pb-3">
                        <slot />
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";
import axios from "axios";

export default {
    components: {
        Sidebar: Sidebar,
        Navbar: Navbar,
    },
    data() {
        return {
            sessionType: null,
        };
    },
    mounted() {
        axios.get("/session/menu").then((response) => {
            this.$store.commit("setMenu", response.data.menu);
            this.sideMenu = this.$store.state.sidebarMenu;
            this.sessionType = response.data.session;
        });
        axios.get("/session/user").then((response) => {
            this.$store.commit("setUser", response.data);
            this.user = this.$store.state.user;
        });
    },
};
</script>

<style>
:root {
    --bg-color: #f8f9fa;

    --navbar-height: 4.875rem;

    --menus-text-color: #67748e;
    --menus-text-color-hover: #344767;

    --main-left: 17.125rem;
}

main {
    padding-bottom: 3rem;
}

.card {
    box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.1);
}

.card .card {
    box-shadow: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: var(--menus-text-color-hover);
}

@media (min-width: 1200px) {
    main {
        margin-left: var(--main-left);
        max-width: calc(100% - var(--main-left));
    }
}
</style>
