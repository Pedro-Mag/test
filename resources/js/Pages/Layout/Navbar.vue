<template>
    <nav class="navbar sticky-top px-0 w-100">
        <div class="container-fluid mt-2 mt-xl-0 row mx-0 px-0">
            <portal-target name="breadcrumbs" class="col"></portal-target>
            <div class="d-flex justify-content-end align-items-center col">
                <div class="mr-4">
                    <span class="mdi mdi-bell mdi-24px"></span>
                </div>
                <UserMenu />
                <Hamburger />
            </div>
        </div>
    </nav>
</template>

<script>
import UserMenu from "./UserMenu"
import Hamburger from "./Hamburger"

export default {
    components: {Hamburger, UserMenu},

};
</script>

<style>
main .navbar {
    height: calc(var(--navbar-height + 0.5rem));
    background-color: var(--bg-color);
    background: rgb(248, 249, 250);
    background: linear-gradient(
        180deg,
        rgba(248, 249, 250, 1) 75%,
        rgba(248, 249, 250, 0) 100%
    );
    color: var(--menus-text-color);
    z-index: 10;
}

main h6 {
    margin-top: 0;
    font-weight: 900;
    color: var(--menus-text-color-hover);
}

@media (min-width: 1200px) {
    main .navbar.fixed-top {
        left: var(--main-left);
    }

    main .navbar .container-fluid {
        margin-top: 1.3rem !important;
    }
}
</style>
