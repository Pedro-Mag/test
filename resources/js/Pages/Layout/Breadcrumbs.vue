<template>
    <nav aria-label="breadcrumb">
        <Head :title="titulo" />
        <ol class="breadcrumb mb-0">
            <li
                class="breadcrumb-item"
                v-for="(item, index) in itens"
                :key="index"
            >
                <Link
                    v-if="item.url"
                    :href="item.url"
                    v-html="item.title"
                ></Link>
                <span v-else v-html="item.title"></span>
            </li>
        </ol>
        <h6 class="my-0" aria-current="page">{{ titulo }}</h6>
    </nav>
</template>

<script>
export default {
    props: {
        breadcrumbs: String,
        titulo: String,
    },
    computed: {
        itens() {
            let itens = this.breadcrumbs.split("/");

            itens = itens.filter(function (value, index, array) {
                return array.indexOf(value) === index;
            });

            let finalItem = [];

            for (let i = 0; i < itens.length; i++) {
                let url = "/" + itens[i];
                if (i > 1) url = finalItem[i - 1].url + url;
                if (i == itens.length - 1) url = null;

                let title =
                    itens[i].indexOf("?") == -1
                        ? itens[i]
                        : itens[i].substring(0, itens[i].indexOf("?"));

                title =
                    i == 0
                        ? '<span class="mdi mdi-home">'
                        : title.charAt(0).toUpperCase() + title.slice(1);

                finalItem.push({
                    title: title,
                    url: url,
                });
            }

            return finalItem;
        },
    },
};
</script>

<style>
@media (max-width: 1199.98px) {
    ol.breadcrumb {
        display: none;
    }
}

main .navbar .breadcrumb span,
main .navbar .breadcrumb a {
    opacity: 0.7;
    -webkit-font-smoothing: antialiased;
    letter-spacing: -0.025rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--menus-text-color);
    text-decoration: none;
}

main .navbar .breadcrumb a:hover {
    text-decoration: underline;
}
</style>
