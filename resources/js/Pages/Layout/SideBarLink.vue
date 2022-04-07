<template>
    <li v-if="text" class="nav-item">
        <Link
            v-if="href !== null"
            :href="href !== null ? '/' + href : ''"
            class="nav-link"
            :class="{ active: active || showMenu }"
        >
            <div class="icon">
                <Icon :mdi="icon" />
            </div>
            <span class="nav-link-text ms-1 flex-grow-1"><slot /></span>
            <span
                v-if="typeof childModules !== 'undefined' && childModules.length"
                class="mdi"
                :class="showMenu ? 'mdi-chevron-right' : 'mdi-chevron-down'"
            ></span>
        </Link>
        <div
            v-else
            class="nav-link"
            :class="{ active: active || showMenu }"
            @click="clickMenu"
        >
            <div class="icon">
                <Icon :mdi="icon" />
            </div>
            <span class="nav-link-text ms-1 flex-grow-1"><slot /></span>
            <span
                v-if="typeof childModules !== 'undefined' && childModules.length"
                class="mdi"
                :class="showMenu ? 'mdi-chevron-right' : 'mdi-chevron-down'"
            ></span>
        </div>
        <transition name="grow">
            <div
                v-if="
                    typeof childModules !== 'undefined' &&
                    childModules.length &&
                    showMenu
                "
            >
                <Link
                    class="nav-link"
                    v-for="childModule in childModules"
                    :key="childModule.text"
                    :href="'/' + childModule.href"
                    >{{ childModule.text }}</Link
                >
            </div>
        </transition>
    </li>
    <HorizontalBreak v-else />
</template>

<script>
import HorizontalBreak from "./HorizontalBreak";

export default {
    components: {
        HorizontalBreak,
    },
    data() {
        return {
            showMenu: false,
        };
    },
    props: {
        href: String,
        text: String,
        icon: String,
        active: Boolean,
        close: String,
        childModules: Array,
    },
    watch: {
        close: function (val) {
            if(val != this.text) this.showMenu = false;
        }
    },
    methods: {
        clickMenu() {
            if(this.href) this.$store.commit("closeMenu");
            this.$emit('close-all', this.text)
            this.showMenu = !this.showMenu;
        },
    },
};
</script>

<style>
.grow-enter-active,
.grow-leave-active {
    max-height: 500px;
    transition: max-height 1s ease-out;
}
.grow-enter,
.grow-leave-to {
    max-height: 0;
    transition: max-height 0.25s ease-out;
}
</style>
