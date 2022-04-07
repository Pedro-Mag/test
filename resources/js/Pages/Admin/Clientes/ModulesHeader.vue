<template>
    <div
        class="card-header bg-dark text-white d-flex flex-wrap align-items-center px-1 px-md-3"
        :class="{
            headerPointer: module.child_modules.length,
            filtered: filtered,
        }"
    >
        <div class="mr-0 mr-md-2">
            <Icon
                v-if="module.child_modules.length"
                :mdi="openStatus ? 'menu-down' : 'menu-right'"
                size="md"
            />
            <div v-else style="width: 24px"></div>
        </div>

        <div
            v-if="!module.child_modules.length"
            class="flex-grow-1 flex-shrink-0 d-flex align-items-center"
        >
            <Icon
                v-if="module.icon"
                :mdi="module.icon"
                size="md"
                class="pr-1 pr-md-2"
            />
            {{ module.text }}
        </div>

        <a
            v-else
            class="d-flex flex-grow-1 flex-shrink-0 align-items-center text-reset text-decoration-none"
            data-toggle="collapse"
            @click="toggleOpenStatus()"
            v-b-toggle="baseDiv"
        >
            <Icon
                v-if="module.icon"
                :mdi="module.icon"
                size="md"
                class="pr-1"
            />
            {{ module.text }}
        </a>

            <b-form-checkbox :disabled="!can.edit" size="lg" v-model="checked" @change="toggleModule" switch></b-form-checkbox>
    </div>
</template>

<script>
export default {
    data() {
        return {
            openStatus: false,
        };
    },
    props: {
        module: Object,
        baseDiv: String,
        filter: String,
        owned: Array,
        can: Object
    },
    computed: {
        filtered() {
            if (this.filter && this.filter.length > 2) {
                const trasformFilter = this.filter
                    .normalize("NFD")
                    .replace(/[\u0300-\u036f]/g, "")
                    .toLowerCase();

                return (
                    this.module.text
                        .normalize("NFD")
                        .replace(/[\u0300-\u036f]/g, "")
                        .toLowerCase()
                        .includes(trasformFilter) ||
                    this.module.name
                        .normalize("NFD")
                        .replace(/[\u0300-\u036f]/g, "")
                        .toLowerCase()
                        .includes(trasformFilter) ||
                    (this.module.url &&
                        this.module.url
                            .normalize("NFD")
                            .replace(/[\u0300-\u036f]/g, "")
                            .toLowerCase()
                            .includes(trasformFilter))
                );
            }
            return false;
        },
        checked: {
            get: function () {
                return this.owned.includes(this.module.id);
            },
            set: function () {

            }
        },
    },
    watch: {
        filtered: function () {
            if (this.filtered) this.$emit("open-parent");
        },
    },
    methods: {
        toggleOpenStatus() {
            this.openStatus = !this.openStatus;
        },
        toggleModule() {
            this.$emit("action-in-module", { action: "toggle", id: this.module.id, value: !this.checked });
        },
    },
};
</script>

<style>
#modulesCard .card:not(:last-of-type) {
    border-bottom: 1px solid #fff !important;
}

#modulesCard .headerPointer {
    cursor: pointer;
}

#modulesCard .buttonGroup {
    display: none;
}

#modulesCard .card-header {
    min-height: 60px !important;
}

#modulesCard .card-header.filtered {
    background-color: #4a8d5b !important;
}

#modulesCard .card-header:hover {
    background-color: #6c757d !important;
}

#modulesCard .card-header:hover > .buttonGroup {
    display: flex;
}

#modulesCard #moveUpDown button {
    height: 16px !important;
    font-size: 10px;
}
</style>
