<template>
    <div>
        <PageTitle titulo="Homepage" />

        <div class="my-5 ml-5">
            <h1 class="h2">SIGO - Sistema Integrado de Gestão de Obra</h1>
            <hr class="my-0 py-0" />
            <h2 class="h3">Cliente: {{ cliente }}</h2>
        </div>

        <hr />

        <div>
            <h4>Bem vindo <span></span>!</h4>
            <div class="ml-2">
                Em que o posso ajudar?
                <ul>
                    <li>
                        <Link href="/logged">Gerir O seu perfil</Link>
                    </li>
                    <li><Link href="/clientes">Gerir clientes</Link></li>
                    <li>
                        <Link href="/modulos">Gerir Módulos e Permissões</Link>
                    </li>
                    <li>
                        <Link href="/utilizadores"
                            >Gerir Utilizadores do painel controlo</Link
                        >
                    </li>
                </ul>
            </div>
        </div>

        <hr />

        <div>
            <label class="typo__label">Tagging</label>
            <multiselect
                v-model="value"
                tag-placeholder="Add this as new tag"
                placeholder="Search or add a tag"
                label="name"
                track-by="code"
                :options="options"
                :multiple="true"
                :taggable="true"
                @tag="addTag"
            ></multiselect>
            <pre class="language-json"><code>{{ value  }}</code></pre>
        </div>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
    components: {
        Multiselect,
    },
    props: {
        cliente: String,
    },
    data() {
        return {
            value: [{ name: "Javascript", code: "js" }],
            options: [
                { name: "Vue.js", code: "vu" },
                { name: "Javascript", code: "js" },
                { name: "Open Source", code: "os" },
            ],
        };
    },
    methods: {
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
