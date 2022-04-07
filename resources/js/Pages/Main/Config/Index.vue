<template>
    <div>
        <PageTitle titulo="Configuração" />

        <div class="accordion" role="tablist">
            <b-card no-body v-for="(item, index) in itens" :key="index">
                <b-card-header header-tag="header" role="tab">
                    <b-button
                        v-if="!item.url"
                        block
                        variant="link"
                        class="text-left text-decoration-none py-0"
                        v-b-toggle="'div_' + index"
                    >
                        <Icon :mdi="item.icon" size="md" class="mr-2" />
                        {{ item.text }}
                    </b-button>
                    <Link
                        v-else
                        as-button
                        class="btn btn-link text-left text-decoration-none stretched-link"
                        :href="item.url"
                    >
                        <Icon :mdi="item.icon" size="md" class="mr-2" />
                        {{ item.text }}
                    </Link>
                </b-card-header>
                <b-collapse
                    v-if="!item.url"
                    :id="'div_' + index"
                    accordion="my-accordion"
                    role="tabpanel"
                >
                    <b-card-body class="pl-5">
                        <b-card-text v-for="(child, index) in item.childItens" :key="index">
                            <Link as-button :href="child.url" class="btn btn-link text-left">
                                {{ child.text }}
                            </Link>
                        </b-card-text>
                    </b-card-body>
                </b-collapse>
            </b-card>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        itens: Array,
    },
};
</script>

<style>
.accordion .card:not(:last-of-type) {
    border: 1px solid #dee2e6 !important;
}

.accordion .card:not(:last-of-type) {
    border-bottom: 2px white solid;
}

.accordion .card-header {
    background-color: #343a40 !important;
}

.accordion .card-header > .btn {
    margin-bottom: 0 !important;
    color: #fff !important;
}

.accordion .card-body > p {
    margin-bottom: 0 !important;
}
</style>
