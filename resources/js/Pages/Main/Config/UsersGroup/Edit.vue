<template>
    <div>
        <PageTitle titulo="Editar grupo de utilizadores" />

        <ErrorAlert :errors="form.errors" />

        <b-form @submit.stop.prevent="handleSubmit">
            <b-form-group label="Designação do grupo:" label-for="name">
                <b-form-input
                    id="name"
                    v-model="form.name"
                    type="text"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.name }"
                    :disabled="!can.edit"
                    required
                ></b-form-input>
                <b-form-invalid-feedback>
                    {{ form.errors.name }}
                </b-form-invalid-feedback>
            </b-form-group>

            <b-form-group
                label="Descrição do grupo:"
                label-for="descricao"
                description="Conjunto de orientações de modo a orientar a seleccção do grupo"
            >
                <b-form-textarea
                    id="descricao"
                    v-model="form.descricao"
                    type="text"
                    placeholder="Inserir designação..."
                    :class="{ 'is-invalid': form.errors.descricao }"
                    :disabled="!can.edit"
                    required
                ></b-form-textarea>
                <b-form-invalid-feedback>
                    {{ form.errors.descricao }}
                </b-form-invalid-feedback>
            </b-form-group>
        </b-form>

        <hr />

        <b-form-group label="Permissões por grupo de utilizadores:">
            <b-card id="permissoes">
                <Permissoes
                    :permissoes="permissoes"
                    :disabled="!can.edit"
                    class="permissoes"
                    v-on:checkBoxChange="changeValue($event)"
                />
            </b-card>
        </b-form-group>

        <hr />
        <b-button
            variant="outline-danger"
            @click="deleteGroup()"
            class="w-100"
            :disabled="!can.delete"
            >Eliminar grupo</b-button
        >
        <WorkingPanelFooter>
            <template #cancel>
                <Link
                    as-button
                    href="/config/grupos_utilizadores"
                    class="btn btn-secondary"
                    >Voltar</Link
                >
            </template>

            <b-button
                variant="primary"
                :disabled="!form.isDirty || form.processing"
                v-if="can.edit"
                @click="handleOk()"
                ><div
                    class="spinner-border spinner-border-sm text-light"
                    role="status"
                    v-if="form.processing"
                >
                    <span></span>
                </div>
                Salvar edição ao grupo</b-button
            >
        </WorkingPanelFooter>
    </div>
</template>

<script>
import ErrorAlert from "@/Shared/ErrorAlert";
import WorkingPanelFooter from "@/Shared/WorkingPanelFooter";
import Permissoes from "../Permissoes";

export default {
    components: {
        ErrorAlert,
        WorkingPanelFooter,
        Permissoes,
    },
    props: {
        permissoes: Array,
        group: Object,
        can: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
                descricao: null,
            }),
        };
    },
    mounted() {
        this.form.id = this.group.id;
        this.form.name = this.group.name;
        this.form.descricao = this.group.descricao;
    },
    methods: {
        handleOk() {
            this.$swal
                .fire({
                    icon: "question",
                    text: "Tem a certeza que deseja editar o grupo de utilizadores?",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.put(
                            `/config/grupos_utilizadores/${this.group.id}`,
                            {
                                onSuccess: () => {
                                    this.showToast(
                                        "Grupo de utilizadores editado com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },
        changeValue(event) {
            this.$inertia.post(
                `/config/grupos_utilizadores/${this.group.id}/permissao`,
                { id: event.id, value: event.value },
                {
                    only: ["permissoes"],
                    preserveState: true,
                    preserveScroll: true,
                    onSuccess: () => {
                        this.showToast("Permissões actualizadas com sucesso!");
                    },
                }
            );
        },
        deleteGroup() {
            this.$swal
                .fire({
                    icon: "warning",
                    html:
                        "Tem a certeza que deseja eliminar o grupo de utilizadores '" +
                        this.form.name +
                        "'?<br>A eliminação será irreversível!",
                    showCancelButton: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.form.delete(
                            `/config/grupos_utilizadores/${this.group.id}`,
                            {
                                onError: (errors) => {
                                    this.showToast(errors.delete, "danger");
                                },
                                onSuccess: () => {
                                    this.showToast(
                                        "Grupo de utilizadores eliminado com sucesso!"
                                    );
                                },
                            }
                        );
                    }
                });
        },
    },
};
</script>

<style></style>
