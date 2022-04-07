<template>
    <div>
        <PageTitle titulo="Homepage" />

        <div class="my-5 ml-5">
            <h1 class="h2">SIGO - Sistema Integrado de Gestão de Obra</h1>
            <hr class="my-0 py-0" />
            <h2 class="h3">Painel controlo</h2>
        </div>

        <hr />

        <div>
            <h4>
                Bem vindo <span>{{ user.name }}</span
                >!
            </h4>
            <div class="ml-2">
                Em que o posso ajudar?
                <ul>
                    <li>
                        <Link href="/logged"
                            >Gerir O seu perfil</Link
                        >
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
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            user: {},
        };
    },
    watch: {
        "$store.state.user": function () {
            this.user = this.$store.state.user;
        },
    },
};
</script>
