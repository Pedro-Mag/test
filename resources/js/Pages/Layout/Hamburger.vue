<template>
    <div
        class="hamburger ml-3 ml-xl-0"
        :class="{ 'is-active': state }"
        @click="$store.commit('toggleMenu')"
    >
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            state: false,
        };
    },
    watch: {
        "$store.state.menu": function () {
            this.state = this.$store.state.menu;
        },
    },
};
</script>

<style>
@media (max-width: 1199.98px) {
    .hamburger {
        width: 30px;
        height: 30px;
        padding-top: 4px;
    }

    .hamburger .line {
        width: 25px;
        height: 2px;
        background-color: #67748e;
        display: block;
        margin: 4px auto;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .hamburger:hover {
        cursor: pointer;
    }

    .hamburger {
        position: relative;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .hamburger.is-active {
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .hamburger:before {
        content: "";
        position: absolute;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        width: 34px;
        height: 34px;
        border: 2px solid transparent;
        top: calc(50% - 17px);
        left: calc(50% - 17px);
        border-radius: 100%;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .hamburger.is-active:before {
        border: 2px solid #67748e;
    }

    .hamburger.is-active .line {
        width: 17px;
    }

    .hamburger.is-active .line:nth-child(2) {
        opacity: 0;
    }

    .hamburger.is-active .line:nth-child(1) {
        -webkit-transform: translateY(6px);
        -ms-transform: translateY(6px);
        -o-transform: translateY(6px);
        transform: translateY(6px);
    }

    .hamburger.is-active .line:nth-child(3) {
        -webkit-transform: translateY(-6px) rotate(90deg);
        -ms-transform: translateY(-6px) rotate(90deg);
        -o-transform: translateY(-6px) rotate(90deg);
        transform: translateY(-6px) rotate(90deg);
    }
}
</style>
