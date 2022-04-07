<template>
    <nav>
        <ul class="pagination pagination-sm flex-wrap">
            <li
                class="page-item"
                :class="[
                    link.url ? '' : 'disabled',
                    link.active ? 'active' : '',
                ]"
                v-for="(link, index) in links"
                :key="index"
            >
                <Link
                    class="page-link"
                    :href="link.url"
                    v-html="link.label"
                ></Link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        links: Array,
    },
};
</script>
