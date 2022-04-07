import Vue from "vue";
import Vuex from "vuex";
import {
    createInertiaApp,
    Link,
    Head
} from "@inertiajs/inertia-vue";
import {
    InertiaProgress
} from "@inertiajs/progress";
import {
    BootstrapVue
} from "bootstrap-vue";
import PortalVue from "portal-vue";
import VueSweetalert2 from "vue-sweetalert2";
// import GmapVue from 'gmap-vue'
import Layout from "./Pages/Layout/Layout";
import Breadcrumbs from "./Pages/Layout/Breadcrumbs";
import PageTitle from "./Pages/Layout/PageTitle";
import Icon from "./Shared/Icon";


Vue.use(Vuex);
Vue.use(BootstrapVue);
Vue.use(PortalVue);

const swalOptions = {
    confirmButtonText: "Confirmar",
    cancelButtonText: "Cancelar",
    denyButtonText: "Não",
    reverseButtons: true,
};

Vue.use(VueSweetalert2, swalOptions);

Vue.component("Link", Link);
Vue.component("Head", Head);
Vue.component("Breadcrumbs", Breadcrumbs);
Vue.component("PageTitle", PageTitle);
Vue.component("Icon", Icon);

createInertiaApp({
    resolve: async (name) => {
        const {
            default: page
        } = await import(`./Pages/${name}`);

        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({
        el,
        App,
        props
    }) {
        new Vue({
            store,
            render: (h) => h(App, props),
        }).$mount(el);
    },
    title: (title) => (title != "SIGO" ? "SIGO - " + title : "SIGO"),
});

const store = new Vuex.Store({
    state: {
        menu: false,
        user: {},
        sidebarMenu: {},
    },
    mutations: {
        toggleMenu(state) {
            state.menu = !state.menu;
        },
        closeMenu(state) {
            state.menu = false;
        },
        setUser(state, user) {
            state.user = user
        },
        setMenu(state, menu) {
            state.sidebarMenu = menu
        }
    }
});

Vue.use(store);

InertiaProgress.init({
    showSpinner: true,
});

Vue.mixin({
    methods: {
        showToast: function (description, variant = "success") {

            const h = this.$createElement

            let icon = 'message-alert-outline';
            if (variant == 'success') icon = 'check-circle-outline'
            if (variant == 'danger') icon = 'close-circle-outline'
            if (variant == 'warning') icon = 'alert-circle-outline'
            if (variant == 'info') icon = 'bell-circle-outline'

            const vNodesMsg = h(
                'div', {
                    class: ['d-flex', 'justify-content-between', 'align-items-center']
                },
                [
                    h('icon', {
                        props: {
                            mdi: icon,
                            size: 'xl'
                        },
                        class: ['mx-3', 'my-0']
                    }),
                    h('strong', {class: ['text-center', 'my-0', 'w-100']},  description),
                ]
            )

            this.$bvToast.toast([vNodesMsg], {
                variant: variant,
                solid: true,
            })
        },
    },
});
