<template>
    <ul>
        <li v-for="permissao in permissoes" :key="permissao.id">
            <PermissaoHeader
                :permissao="permissao"
                :parentDiv="'div-' + permissao.id"
                :disabled="disabled"
                v-on:checkBoxChange="$emit('checkBoxChange', $event)"
            />
            <b-collapse :id="'div-' + permissao.id">
                <Permissoes
                    v-if="permissao.childs.length"
                    :permissoes="permissao.childs"
                    :disabled="disabled"
                    v-on:checkBoxChange="$emit('checkBoxChange', $event)"
                />
            </b-collapse>
        </li>
    </ul>
</template>

<script>
import PermissaoHeader from "./PermissaoHeader.vue";
export default {
    name: "Permissoes",
    components: {
        PermissaoHeader,
    },
    props: {
        permissoes: Array,
        disabled: {
            default: false,
            type: Boolean,
        }
    },
};
</script>

<style>
#permissoes.card {
    border: 1px solid #ced4da;
}

ul.permissoes {
    margin-block-start: 0;
    margin-block-end: 0;
    padding-left: 0;
}

.permissoes li {
    list-style-type: none;
}
</style>
