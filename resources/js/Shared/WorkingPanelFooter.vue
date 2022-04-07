<template>
    <div>
        <hr />

        <b-row align-h="end" class="px-3" id="working-panel">
            <b-col
                md="auto"
                v-if="cancelSlot"
                class="mb-1 mb-md-0 text-right px-0"
            >
                <slot name="cancel"></slot>
            </b-col>
            <b-col
                md="auto"
                v-if="extraSlot"
                class="mb-1 mb-md-0 text-right px-0 ml-md-2"
            >
                <slot name="extra"></slot>
            </b-col>
            <b-col md="auto" class="mb-md-0 text-right px-0 ml-md-2">
                <slot></slot>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    computed: {
        extraSlot: function () {
            return !!this.$slots.extra;
        },
        cancelSlot: function () {
            return !!this.$slots.cancel;
        },
    },
};
</script>

<style>
@media (max-width: 768px) {
    #working-panel .btn {
        width: 100% !important;
    }
}
</style>
