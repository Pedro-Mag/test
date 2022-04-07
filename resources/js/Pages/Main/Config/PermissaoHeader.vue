<template>
    <div class="d-flex">
        <b-button
            v-b-toggle="parentDiv"
            variant="link"
            v-if="permissao.childs.length"
            @click="collapsed = !collapsed"
            ><Icon :mdi="collapsed ? 'plus-box' : 'minus-box'"
        /></b-button>
        <b-form-checkbox
            v-model="checked"
            name="check-button"
            :disabled="disabled"
            switch
            @change="
                $emit('checkBoxChange', { id: permissao.id, value: checked })
            "
        >
            {{ permissao.text }}
        </b-form-checkbox>
    </div>
</template>

<script>
export default {
    data() {
        return {
            collapsed: true,
            checked: null,
        };
    },
    props: {
        permissao: Object,
        parentDiv: String,
        disabled: Boolean,
    },
    watch: {
        permissao() {
            this.checked = this.permissao.value;
        },
    },
    mounted() {
        this.checked = this.permissao.value;
    },
};
</script>

<style>
#permissoes .d-flex > button {
    width: 25px;
}
#permissoes .d-flex > button + .custom-switch {
    margin-left: 0;
}
#permissoes .d-flex > .custom-switch {
    margin-left: 25px;
}

#permissoes .d-flex button {
    padding: 0;
    padding-right: 5px;
    color: rgb(66, 66, 66);
}
</style>
