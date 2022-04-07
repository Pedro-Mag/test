<template>
    <div>
        <a
            href="#"
            class="d-flex justify-content-center"
            @click="$refs.fileInput.click()"
            v-b-tooltip.hover
            :title="tooltip"
        >
            <b-img rounded="circle" :src="servedImage" :width="width"></b-img>
        </a>

        <input
            style="display: none"
            type="file"
            ref="fileInput"
            v-on:change="onPhotoUpload"
        />

        <b-modal
            id="cropper"
            title="Criar avatar"
            cancel-title="Cancelar"
            ok-title="Avançar"
            @ok="handleOk"
        >
            <div class="content">
                <div class="img-cropper">
                    <vue-cropper
                        ref="cropper"
                        :aspect-ratio="1 / 1"
                        :src="tempPhoto"
                    />
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    <b-button-group size="lg">
                        <b-button
                            @click="zoom(-0.2)"
                            v-b-tooltip.hover
                            title="Diminuir imagem"
                            ><Icon mdi="magnify-minus" size="md"
                        /></b-button>
                        <b-button
                            @click="rotate(-90)"
                            v-b-tooltip.hover
                            title="Rodar para a esquerda"
                            ><Icon mdi="rotate-left" size="md"
                        /></b-button>
                        <b-button
                            @click="reset()"
                            v-b-tooltip.hover
                            title="Recuperar imagem inicial"
                            ><Icon mdi="restore" size="md"
                        /></b-button>
                        <b-button
                            @click="rotate(90)"
                            v-b-tooltip.hover
                            title="Rodar para a direita"
                            ><Icon mdi="rotate-right" size="md"
                        /></b-button>
                        <b-button
                            @click="zoom(0.2)"
                            v-b-tooltip.hover
                            title="Aumentar imagem"
                            ><Icon mdi="magnify-plus" size="md"
                        /></b-button>
                    </b-button-group>
                </div>
            </div>

        </b-modal>
    </div>
</template>

<script>
import VueCropper from "vue-cropperjs";
import "cropperjs/dist/cropper.css";
export default {
    components: {
        VueCropper,
    },
    data() {
        return {
            cropImg: "",
            tempPhoto: null,
            data: null,
            croppedImage: null,
        };
    },
    props: {
        imgSrc: {
            type: String,
            default: "/images/johndoe.png",
        },
        width: {
            type: String,
            default: "300px",
        },
        tooltip: {
            type: String,
            default: "Clique para carregar imagem"
        }
    },
    computed: {
        servedImage: function () {
            if (this.croppedImage) return this.croppedImage;
            return this.imgSrc;
        },
    },
    methods: {
        onPhotoUpload(e) {
            this.tempPhoto = URL.createObjectURL(e.target.files[0]);
            e.target.files = null;
            this.$bvModal.show("cropper");
        },
        handleOk() {
            let tempImage = this.$refs.cropper.getCroppedCanvas().toDataURL();
            getResizedImage(tempImage).then((image) => {
                this.croppedImage = image;
                this.$emit("ImageCropped", this.croppedImage);
            });
        },
        reset() {
            this.$refs.cropper.reset();
        },
        rotate(deg) {
            this.$refs.cropper.rotate(deg);
        },
        zoom(percent) {
            this.$refs.cropper.relativeZoom(percent);
        },
    },
};

function getResizedImage(croppedImage) {
    return new Promise((resolve) => {
        let image = new Image();
        image.src = croppedImage;
        image.onload = function (event) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");

            ctx.drawImage(image, 0, 0);

            var MAX_WIDTH = 300;
            var MAX_HEIGHT = 300;
            var width = image.width;
            var height = image.height;

            if (width > height) {
                if (width > MAX_WIDTH) {
                    height *= MAX_WIDTH / width;
                    width = MAX_WIDTH;
                }
            } else {
                if (height > MAX_HEIGHT) {
                    width *= MAX_HEIGHT / height;
                    height = MAX_HEIGHT;
                }
            }
            canvas.width = width;
            canvas.height = height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(image, 0, 0, width, height);

            // Show resized image in preview element
            var dataurl = canvas.toDataURL();

            resolve(dataurl);
        };
    });
}
</script>

<style>
#cropperjs {
    display: block;
    max-width: 250px;
}

#preview {
    width: 300px;
    height: 300px;
    margin-bottom: 10px;
    border-radius: 100%;
}

.cropper-view-box {
    border-radius: 50%;
}

.cropper-face {
    background-color: inherit !important;
}
</style>
