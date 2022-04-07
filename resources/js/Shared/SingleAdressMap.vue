<template>
    <div>
        <b-form-textarea
            placeholder="Introduzir endereço"
            v-model="address"
            class="w-100"
            required
            :readonly="!editable"
            :disabled="disabled"
            @keydown.enter.native="searchAddress"
            :class="{ 'is-invalid': error }"
        ></b-form-textarea>
        <div v-if="error" class="invalid-feedback d-block">{{ error }}.</div>

        <gmap-map
            style="width: 100%; height: 300px"
            class="mt-3"
            :zoom="15"
            :center="center"
            :options="{
                zoomControl: true,
                mapTypeControl: false,
                fullscreenControl: false,
                disableDefaultUi: true,
                utc_offset: false,
            }"
            ref="mmm"
            @click="addMarker"
        >
            <gmap-marker
                v-for="(marker, index) in markers"
                :key="index"
                :position="marker.position"
                :clickable="editable"
                :draggable="editable"
                @dragend="addMarker"
            ></gmap-marker>
        </gmap-map>
    </div>
</template>

<script>
import Vue from "vue";
import GmapVue from "gmap-vue";

Vue.use(GmapVue, {
    load: {
        key: "AIzaSyBDfq6aACnjUpjDw_0Zs-hqwDhWznpZ-tM",
        libraries: "places",
        region: 'pt-PT"',
        language: 'pt-PT"',
    },
    installComponents: true,
});

export default {
    data: function () {
        return {
            markers: [],
            address: null,
            latitude: null,
            longitude: null,
            center: { lat: 41.158, lng: -8.629 },
        };
    },
    props: {
        currentAddress: {
            type: String,
            default: null,
        },
        currentLat: {
            type: String,
            default: null,
        },
        currentLng: {
            type: String,
            default: null,
        },
        error: {
            type: String,
            default: null,
        },
        editable: {
            type: Boolean,
            default: true,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        mapCenter: {
            type: Object,
            default: null,
        },
    },
    mounted() {
        if (this.mapCenter) this.center = this.mapCenter;
        setTimeout(() => {
            if (this.currentAddress !== null) {
                this.longitude = isNaN(this.currentLng)
                    ? this.currentLng
                    : Number(this.currentLng);
                this.latitude = isNaN(this.currentLat)
                    ? this.currentLat
                    : Number(this.currentLat);
                this.address = this.currentAddress;

                let markerPosition = {
                    lat: this.latitude,
                    lng: this.longitude,
                };
                this.center = markerPosition;
                this.createMarker(markerPosition);
            }
        }, 500);
    },
    watch: {
        address: function () {
            let position = {
                address: this.address,
                lat: this.latitude,
                lng: this.longitude,
            };
            this.$emit("update", position);
        },
    },
    methods: {
        addMarker(event) {
            let position = event.latLng;
            position = {
                lat: position.lat(),
                lng: position.lng(),
            };
            this.createMarker(position);

            this.$gmapApiPromiseLazy().then(() => {
                const geocoder = new google.maps.Geocoder();

                geocoder.geocode(
                    {
                        latLng: event.latLng,
                    },
                    (results, status) => {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0])
                                this.address = results[0].formatted_address;
                        }
                    }
                );
            });
        },
        searchAddress() {
            let address = this.address;

            this.$gmapApiPromiseLazy().then(() => {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode(
                    {
                        address: address,
                    },
                    (results, status) => {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                this.address = results[0].formatted_address;

                                let position = results[0].geometry.location;
                                position = {
                                    lat: position.lat(),
                                    lng: position.lng(),
                                };
                                this.createMarker(position);
                            }
                        } else {
                            this.$swal.fire({
                                text: "Não foi possível detetar o endereço digitado!",
                                icon: "error",
                            });
                        }
                    }
                );
            });
        },
        createMarker(position) {
            const marker = {
                lat: position.lat,
                lng: position.lng,
            };

            (this.latitude = position.lat),
                (this.longitude = position.lng),
                (this.markers = []);
            this.markers.push({ position: marker });
            this.$refs.mmm.panTo(marker);
        },
    },
};
</script>

<style>
a[href^="http://maps.google.com/maps"]
{
    display: none !important;
}
a[href^="https://maps.google.com/maps"]
{
    display: none !important;
}

.gmnoprint a,
.gmnoprint span,
.gm-style-cc {
    display: none;
}
.gmnoprint div {
    background: none !important;
}
</style>
