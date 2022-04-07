<template>
    <aside
        class="navbar navbar-vertical border-radius-xl"
        :class="{ expanded: state }"
    >
        <NavbarImg :sessionType="sessionType" />

        <hr class="mt-0" />
            <div class="navbar-content">
                <perfect-scrollbar>
                    <ul class="navbar-nav mb-5 sidebar-nav" @mouseleave="closeAll(null)">
                        <SideBarLink
                            v-for="item in sideMenu"
                            :key="item.text"
                            :href="item.href"
                            :text="item.text"
                            :icon="item.icon"
                            :childModules="item.childModules"
                            :active="url == item.activeLink"
                            :close="closeExcept"
                            v-on:close-all="closeAll($event)"
                            >{{ item.text }}</SideBarLink
                        >
                    </ul>
                </perfect-scrollbar>
            </div>
    </aside>
</template>

<script>
import { PerfectScrollbar } from 'vue2-perfect-scrollbar'
import SideBarLink from "./SideBarLink";
import NavbarImg from "./NavbarImg";

export default {
    components: {
        PerfectScrollbar,
        SideBarLink,
        NavbarImg
    },
    data() {
        return {
            closeExcept: null,
        }
    },
    props: {
        sessionType: String,
    },
    computed: {
        url() {
            return this.$page.component.split("/")[1];
        },
        state() {
            return this.$store.state.menu;
        },
        sideMenu() {
            return this.$store.state.sidebarMenu;
        },
    },
    methods: {
        closeAll(origin) {
            this.closeExcept = origin;
        }
    }
};
</script>

<style src="vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css" />
<style>
.navbar-vertical {
    display: block;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow-y: hidden;
    box-shadow: none;
    margin-left: 1rem !important;
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
    padding: 0 0 1.5rem 0;
    max-height: calc(100vh - 2rem);
    z-index: 20;
}

.navbar-content .ps {
    height: calc(100vh - 3rem);
}

.navbar-header {
    height: var(--navbar-height);
}

#close-menu {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
}

#close-menu .btn-close {
    width: 0.2rem;
    height: 0.2rem;
}

.navbar-vertical .navbar-brand {
    margin: 0 !important;
    display: block;
    padding: 1.1rem 2rem;
}

.navbar-vertical .navbar-brand > img {
    max-width: 100%;
    max-height: 2rem;
}

.navbar-vertical hr {
    border: 0;
    opacity: 0.25;
    -webkit-font-smoothing: antialiased;
    margin-top: 1rem;
    height: 1px;
    background-color: transparent;
    background-image: linear-gradient(
        to right,
        rgba(0, 0, 0, 0),
        rgba(0, 0, 0, 0.4),
        rgba(0, 0, 0, 0)
    );
}

.navbar-vertical > .navbar-content {
    position: relative;
    flex-basis: 100%;
    flex-grow: 1;
    align-items: center;
    width: auto !important;
    max-height: calc(100vh - var(--navbar-height) - 2rem) !important;
    overflow: hidden;
    overflow-anchor: none;
    touch-action: auto;
    display: block;
}

.sidebar-nav.navbar-nav {
    margin-top: 0;
    -webkit-font-smoothing: antialiased;
    display: flex;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
}

.sidebar-nav.navbar-nav .nav-item {
    list-style: none;
    box-sizing: border-box;
    width: 100%;
    margin-top: 0.25rem;
}

.sidebar-nav.navbar-nav .nav-item:last-of-type {
    margin-bottom: 2rem;
}

.navbar-vertical .nav-link {
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    letter-spacing: -0.025rem;
    font-weight: 400;
    color: var(--menus-text-color);
}

ul.sidebar-nav > li > .nav-link {
    font-size: 0.875rem;
    padding-left: 1rem;
    padding-right: 1rem;
    color: var(--menus-text-color);
    display: flex;
    align-items: center;
    white-space: nowrap;
    padding-top: 0.675rem;
    padding-bottom: 0.675rem;
    margin: 0;
}

ul.sidebar-nav > li > .nav-link:hover,
ul.sidebar-nav > li > .nav-link.open,
ul.sidebar-nav > li > .nav-link.active {
    font-weight: 600;
}

ul.sidebar-nav > li > .nav-link .icon {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    width: 32px;
    height: 32px;
    margin-right: 0.5rem !important;
    padding: 10px;
    border-radius: 0.5rem;
    box-shadow: 0 0.25rem 0.375rem -0.0625rem rgba(20, 20, 20, 0.12),
        0 0.125rem 0.25rem -0.0625rem rgba(20, 20, 20, 0.07) !important;
    font-size: 1.35rem;
}

ul.sidebar-nav > li > .nav-link.active .icon {
    background-image: linear-gradient(310deg, #344767 0%, #344767 100%);
}

ul.sidebar-nav > li > .nav-link.active .icon .mdi:before {
    color: #fff;
}

ul.sidebar-nav > li > div {
    font-size: 0.8rem;
    margin-top: -0.5rem;
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    padding-left: 3.5rem;
    cursor: pointer;
}

ul.sidebar-nav > li > div+div {
    background-color: white;
    border-radius: 0.5rem;
    margin-top: -0.5rem;
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    padding-left: 3.5rem;
}

ul.sidebar-nav > li > div > .nav-link,
ul.sidebar-nav > li > div > .dropdown-divider-title {
    font-weight: 400;
    padding: 0.5rem 0.75rem;
}

ul.sidebar-nav > li > div > .nav-link:hover {
    font-weight: 500;
}

ul.sidebar-nav > li > div > .dropdown-divider-title {
    font-weight: 600;
    margin-bottom: 0;
}

@media (max-width: 1199.98px) {
    .navbar-vertical {
        --boxWidth: calc(100vw - 2rem - 50px);
        z-index: 990;
        background-color: white;
        box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
        border-radius: 1rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        bottom: auto;
        left: calc(-1rem - var(--boxWidth));
        max-width: var(--boxWidth);
        transition: left 500ms ease-in-out;
    }

    .navbar-vertical.expanded {
        left: 0;
    }
}

@media (min-width: 1200px) {
    .navbar-vertical {
        max-width: 15.625rem !important;
    }

    ul.sidebar-nav > li > .nav-link:hover,
    ul.sidebar-nav > li > .nav-link.open,
    ul.sidebar-nav > li > .nav-link.active {
        border-radius: 0.5rem;
        background-color: #fff;
    }

    ul.sidebar-nav > li > .nav-link:hover,
    ul.sidebar-nav > li > .nav-link.active {
        box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);
    }

    ul.sidebar-nav > li > .nav-link .nav-link-text + .mdi:before {
        opacity: 0;
        transition: all ease 200ms;
    }

    ul.sidebar-nav > li > .nav-link.open .nav-link-text + .mdi:before,
    ul.sidebar-nav > li > .nav-link:hover .nav-link-text + .mdi:before {
        opacity: 1;
    }

    ul.sidebar-nav > li > div .nav-link:hover {
        font-weight: 600;
    }
}
</style>
