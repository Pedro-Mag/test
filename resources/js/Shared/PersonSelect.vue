<template>
    <Multiselect
        v-model="value"
        :options="options"
        :custom-label="customLabel"
        placeholder="Seleccione uma opção"
        selectLabel="Clique para seleccionar"
        selectedLabel="Seleccionado"
        deselectLabel="Clique para remover selecção"
    >
        <template slot="noResult">Sem resultados</template>
        <template slot="noOptions">Nenhuma opção seleccionada</template>
        <template slot="singleLabel" slot-scope="props">
            <img class="select-thumb" :src="props.option.thumbnail" />
            <span class="ml-2">{{ props.option.name }}</span>
        </template>
        <template slot="option" slot-scope="props">
            <img class="select-thumb" :src="props.option.thumbnail" />
            <span class="ml-2">{{ props.option.name }}</span>
        </template>
    </Multiselect>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect,
    },
    data() {
        return {
            value: null,
        };
    },
    props: {
        options: Array,
        selectedId: Number,
    },
    mounted() {
        setTimeout(() => {
            if (this.selectedId !== null) {
                let key = Object.keys(this.options).find(
                    (key) => this.options[key].id === this.selectedId
                );

                this.value = this.options[key];
            }
        }, 250);
    },
    watch: {
        value: function () {
            let value = this.value ? this.value.id : null;
            this.$emit("update", value);
        },
    },
    methods: {
        customLabel({ name }) {
            return `${name}`;
        },
    },
};
</script>

<style>
.select-thumb {
    height: 22px;
    border-radius: 100%;
}
</style>
