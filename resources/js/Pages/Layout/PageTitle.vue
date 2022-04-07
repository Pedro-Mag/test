<template>
    <portal to="breadcrumbs">
        <Breadcrumbs :breadcrumbs="$page.url" :titulo="titulo"></Breadcrumbs>
    </portal>
</template>

<script>
export default {
    props: {
        titulo: String
    }
};
</script>

<style></style>
