<template>
    <multiselect
        v-model="value"
        tag-placeholder="Adicionar"
        placeholder="Seleccione, no minimo, uma opção"
        selectLabel="Clique para seleccionar"
        selectedLabel="Seleccionado"
        deselectLabel="Clique para remover selecção"
        label="name"
        track-by="id"
        :options="options"
        :multiple="true"
        :disabled="disabled"
        :taggable="true"
        :close-on-select="false"
        :hide-selected="true"
        @tag="addTag"
    >
        <template slot="noResult">Sem resultados</template>
        <template slot="noOptions">Nenhuma opção seleccionada</template>
    </multiselect>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect,
    },
    props: {
        options: Array,
        selectedIds: {
            type: Array,
            default: () => [],
        },
        disabled: {
            default: false,
            type: Boolean,
        }
    },
    data() {
        return {
            value: [],
        };
    },
    mounted() {
        setTimeout(() => {
            if (this.selectedIds !== undefined && this.selectedIds.length) {
                this.value = [];
                let selectedIds = this.selectedIds;
                let options = Object.keys(this.options);
                selectedIds.forEach((item) => {
                    let key = options.find(
                        (key) => this.options[key].id === item
                    );
                    this.value.push(this.options[key])
                });
            }
        }, 250);
    },
    watch: {
        value: function () {
            let originalArray = this.value;
            let responseArray = [];
            originalArray.forEach((item) => {
                responseArray.push(item.id);
            });
            this.$emit("update", responseArray);
        },
    },
    methods: {
        customLabel({ name }) {
            return `${name}`;
        },
        addTag(newTag) {
            const tag = {
                name: newTag,
                code:
                    newTag.substring(0, 2) +
                    Math.floor(Math.random() * 10000000),
            };
            this.options.push(tag);
            this.value.push(tag);
        },
    },
};
</script>

<style></style>
