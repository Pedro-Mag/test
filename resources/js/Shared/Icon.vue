<template>
  <span class="mdi" :class="'mdi-' + mdi + ' ' + icon_size"></span>
</template>

<script>
export default {
    props: {
        mdi: String,
        size: String
    },
    computed: {
        icon_size() {
            let temp_str = "";
            if (this.size == "sm") temp_str= "mdi-18px";
            if (this.size == "md") temp_str= "mdi-24px";
            if (this.size == "lg") temp_str= "mdi-36px";
            if (this.size == "xl") temp_str= "mdi-48px";

            return temp_str;
        }
    }
}
</script>
