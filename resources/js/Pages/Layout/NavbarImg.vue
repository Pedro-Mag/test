<template>
    <div class="navbar-header" v-if="sessionType">
        <BrandIcons class="navbar-brand" :sessionType="sessionType" />
    </div>
</template>

<script>
import BrandIcons from "./BrandIcons"
export default {
    components: { BrandIcons },
    props: {
        sessionType: String,
    },
};
</script>

<style>

</style>
