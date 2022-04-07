<template>
    <main class="d-flex align-items-center justify-content-center background">
        <Head :title="titulo" />
        <section class="card border-warning px-3 px-md-5">

            <BrandIcons :sessionType="sessionType" class="pt-4 pb-2 pt-md-5 pb-md-4" />

            <hr>

            <div class="card-body py-2 px-0">
                <div class="card-title mb-4">
                    <h5>Faça Login...</h5>
                </div>

                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="" class="form-label"
                            >Endereço de email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            class="form-control form-control-sm"
                            :class="[
                                { 'is-invalid': errors.email },
                                {
                                    'is-valid':
                                        form.email &&
                                        Object.keys(errors).length,
                                },
                            ]"
                            name="email"
                            id="email"
                            placeholder="Inserir email..."
                        />
                        <div class="invalid-feedback">
                            {{ errors.email }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            v-model="form.password"
                            type="password"
                            class="form-control form-control-sm"
                            :class="{ 'is-invalid': errors.password }"
                            name="password"
                            id="password"
                            placeholder="Inserir password..."
                        />
                        <div class="invalid-feedback">
                            {{ errors.password }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <b-form-checkbox
                            id="remember"
                            v-model="form.remember"
                            name="remember"
                            size="sm"
                            value="1"
                            unchecked-value="0"
                        >
                            <span class="text-small"
                                >Lembrar dados de acesso?</span
                            >
                        </b-form-checkbox>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100 mb-2"
                        :disabled="form.processing"
                    >
                        <span
                            v-if="form.processing"
                            class="spinner-border spinner-border-sm me-1"
                            role="status"
                            aria-hidden="true"
                        ></span>
                        Login
                    </button>

                    <div class="text-center small">
                        <a href="#">Esqueci-me da minha password...</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
import BrandIcons from "../Layout/BrandIcons"

export default {
    layout: null,
    components: { BrandIcons },
    data() {
        return {
            form: this.$inertia.form({
                email: null,
                password: null,
                remember: false,
            }),
            titulo: "Login",
        };
    },
    props: {
        errors: Object,
        sessionType: String,
    },
    methods: {
        submit: function () {
            this.form.post("/login");
            this.form.password = "";
        },
    },
};
</script>

<style>
.background {
    background: rgb(131, 58, 180);
    background: linear-gradient(
        152deg,
        rgba(131, 58, 180, 0.45) 0%,
        rgba(253, 29, 29, 0.45) 50%,
        rgba(252, 176, 69, 0.45) 100%
    );
    height: 100vh;
    width: 100vw;
    margin-left: 0 !important;
    max-width: 100vw !important;
}

.background .card {
    margin: 30px 0;
    width: 30vw;
    min-width: 300px;
}

.background .card-header img {
    height: 2.5rem;
    margin: 1rem 0;
}
</style>
