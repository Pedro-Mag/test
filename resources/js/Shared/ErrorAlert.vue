<template>
    <b-alert :show="show" variant="danger" fade>
        <h5 class="alert-heading d-flex align-items-center">
            <Icon mdi="alert-octagon" size="lg" class="mr-2"/>
            Foram detectados erros na submissão do formulário!
        </h5>
        <hr>
        <ol>
            <li v-for="error in errors" :key="error">{{ error }}</li>
        </ol>
    </b-alert>
</template>

<script>
export default {
    props: {
        errors: Object
    },
    computed: {
        show: function () {
            return !!Object.keys(this.errors).length
        }
    }
};
</script>

<style></style>
