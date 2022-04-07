<template>
    <div class="container">
        <Head title="Conta suspensa" />

        <div style="height: 100vh">
            <nav>
                <BrandIcons sessionType="sessionType" class="pt-4 pb-2 pt-md-5 pb-md-4" />
                <hr>
            </nav>

            <div class="h-50 d-flex  align-items-center">
            <b-alert show variant="warning" class="p-5 w-100">
                <h4>A conta <em><u>{{ account }}</u></em> encontra-se suspensa!</h4>
                <hr />
                Por favor, Contacte o administrador.
            </b-alert>
            </div>
        </div>
    </div>
</template>

<script>
import BrandIcons from "../Layout/BrandIcons"

export default {
    layout: null,
    components: { BrandIcons },
    props: {
        account: String,
    }
};
</script>

<style></style>
