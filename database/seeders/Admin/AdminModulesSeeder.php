<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdminModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (Schema::hasTable('modules') && !Module::exists()) {
            Module::create([
                'id' => 1,
                'name' => 'controlo_diario',
                'text' => 'Registo diário',
                'icon' => 'calendar',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 2,
                'name' => 'registo_diario',
                'text' => 'Registo diário',
                'icon' => NULL,
                'url' => 'registo_diario',
                'parent_id' => 1,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 3,
                'name' => 'registo_diario_editar',
                'text' => 'Criar/editar registo diário',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 2,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 4,
                'name' => 'livro_ponto',
                'text' => 'Livro de ponto',
                'icon' => NULL,
                'url' => 'diario_resumo',
                'parent_id' => 1,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 5,
                'name' => 'livro_ponto_exportar',
                'text' => 'Exportar livro de ponto',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 4,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 6,
                'name' => 'decl_covid',
                'text' => 'Emissão registo COVID',
                'icon' => NULL,
                'url' => 'diario_covid',
                'parent_id' => 1,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 7,
                'name' => 'decl_covid_exportar',
                'text' => 'Exportar registo COVID',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 6,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 8,
                'name' => 'orcamentos',
                'text' => 'Orçamentos',
                'icon' => 'file',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 9,
                'name' => 'orcamentos_abrir',
                'text' => 'Gestão de orçamentos',
                'icon' => NULL,
                'url' => 'orcamento_gest',
                'parent_id' => 8,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 10,
                'name' => 'orcamentos_editar',
                'text' => 'Criar/editar orçamento',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 9,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 11,
                'name' => 'orcamentos_exportar',
                'text' => 'Exportar orçamento',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 9,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 12,
                'name' => 'obras',
                'text' => 'Obras',
                'icon' => 'file-compare',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-24 21:59:21'
            ]);
            Module::create([
                'id' => 13,
                'name' => 'obras_gest',
                'text' => 'Gestão de obras',
                'icon' => 'obras_gest',
                'url' => NULL,
                'parent_id' => 12,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 14,
                'name' => 'obras_gest_adendas',
                'text' => 'Criar/editar adendas ao contrato',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 13,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 15,
                'name' => 'obras_gest_autos',
                'text' => 'Criar/editar facturação',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 13,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 16,
                'name' => 'obras_gest_rececoes',
                'text' => 'Criar/editar recepções',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 13,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 17,
                'name' => 'obras_gest_exportar',
                'text' => 'Exportar relatórios',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 13,
                'order' => 4,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 18,
                'name' => 'relatorio_obra',
                'text' => 'Relatorios',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 12,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 19,
                'name' => 'relatorio_obra_listagem',
                'text' => 'Listagem de obras',
                'icon' => NULL,
                'url' => 'obras_list',
                'parent_id' => 18,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 20,
                'name' => 'relatorio_obra_faturacao',
                'text' => 'Facturação',
                'icon' => NULL,
                'url' => 'obrasRelatorio',
                'parent_id' => 18,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 21,
                'name' => 'caucoes',
                'text' => 'Cauções e garantias',
                'icon' => NULL,
                'url' => 'obrasCaucoes',
                'parent_id' => 18,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 22,
                'name' => 'settings_client_obras',
                'text' => 'Donos de obra e clientes',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 12,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 23,
                'name' => 'settings_client_client',
                'text' => 'Gestão de clientes',
                'icon' => NULL,
                'url' => 'config_client_gest',
                'parent_id' => 22,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 24,
                'name' => 'centrocustos',
                'text' => 'Centro de custos',
                'icon' => 'chart-pie',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-24 21:59:20'
            ]);
            Module::create([
                'id' => 25,
                'name' => 'pessoal',
                'text' => 'Mão de obra',
                'icon' => 'account-multiple',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-24 21:59:21'
            ]);
            Module::create([
                'id' => 26,
                'name' => 'listagem_pessoal',
                'text' => 'Listagem de pessoal',
                'icon' => NULL,
                'url' => 'pessoal_list',
                'parent_id' => 25,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 27,
                'name' => 'listagem_pessoal_exportar',
                'text' => 'Exportar listagem de funcionários',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 26,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 28,
                'name' => 'pessoal_gest',
                'text' => 'Gestão de mão de obra',
                'icon' => NULL,
                'url' => 'pessoal_gest',
                'parent_id' => 25,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 29,
                'name' => 'pessoal_gest_editar',
                'text' => 'Criar/editar funcionário',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 28,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 30,
                'name' => 'pessoal_gest_exportar',
                'text' => 'Exportar fichas de funcionário',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 28,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 31,
                'name' => 'gest_func_pessoal',
                'text' => 'Gestão de funções de mão de obra',
                'icon' => NULL,
                'url' => 'pessoal_func_gest',
                'parent_id' => 25,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 32,
                'name' => 'gest_func_pessoal_editar',
                'text' => 'Criar/editar funções de mão de obra',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 31,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 33,
                'name' => 'equipamento',
                'text' => 'Equipamento',
                'icon' => 'bulldozer',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 34,
                'name' => 'equipamento_gest',
                'text' => 'Gestão de equipamento',
                'icon' => NULL,
                'url' => 'equip_gest',
                'parent_id' => 33,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 35,
                'name' => 'equipamento_editar',
                'text' => 'Criar/editar equipamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 34,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 36,
                'name' => 'equipamento_tipo',
                'text' => 'Gestão de tipos de equipamentos',
                'icon' => NULL,
                'url' => 'equip_tipo_gest',
                'parent_id' => 33,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 37,
                'name' => 'equipamento_tipo_editar',
                'text' => 'Criar/editar tipos de equipamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 36,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 38,
                'name' => 'hsete',
                'text' => 'Higiene e segurança',
                'icon' => 'hard-hat',
                'url' => NULL,
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 39,
                'name' => 'episs',
                'text' => 'EPI\'s',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 38,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 40,
                'name' => 'epis_dist',
                'text' => 'Distribuição de EPI\'s',
                'icon' => NULL,
                'url' => 'epis_dist',
                'parent_id' => 39,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 41,
                'name' => 'epis_gest',
                'text' => 'Gestão de EPI\'s',
                'icon' => NULL,
                'url' => 'epis_gest',
                'parent_id' => 39,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 42,
                'name' => 'fapte',
                'text' => 'Fichas de aptidão médica',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 38,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 43,
                'name' => 'fapt_edit',
                'text' => 'Gestão fichas de aptidão',
                'icon' => NULL,
                'url' => 'fapt_edit',
                'parent_id' => 42,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 44,
                'name' => 'fapt_view_doc',
                'text' => 'Permissão para visualizar as FAPT',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 43,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 45,
                'name' => 'settings',
                'text' => 'Configurações',
                'icon' => 'cogs',
                'url' => 'config',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 46,
                'name' => 'settings_users',
                'text' => 'Gestão de utilizadores',
                'icon' => 'account-multiple',
                'url' => NULL,
                'parent_id' => 45,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 47,
                'name' => 'users',
                'text' => 'Utilizadores',
                'icon' => NULL,
                'url' => 'config\\utilizadores',
                'parent_id' => 46,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-26 12:04:52'
            ]);
            Module::create([
                'id' => 48,
                'name' => 'users_group',
                'text' => 'Grupos de utilizadores',
                'icon' => NULL,
                'url' => 'config\\grupos_utilizadores',
                'parent_id' => 46,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 49,
                'name' => 'settings_client',
                'text' => 'Empresa',
                'icon' => 'office-building',
                'url' => NULL,
                'parent_id' => 45,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 50,
                'name' => 'settings_client_data',
                'text' => 'Dados da empresa',
                'icon' => NULL,
                'url' => 'config\\empresa',
                'parent_id' => 49,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 51,
                'name' => 'settings_app',
                'text' => 'Aplicação',
                'icon' => 'code-braces-box',
                'url' => NULL,
                'parent_id' => 45,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 52,
                'name' => 'settings_app_email',
                'text' => 'Email',
                'icon' => NULL,
                'url' => 'config\\email',
                'parent_id' => 51,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-26 11:08:48'
            ]);
            Module::create([
                'id' => 53,
                'name' => 'settings_app_gmaps',
                'text' => 'Google Maps',
                'icon' => NULL,
                'url' => 'config\\google_maps',
                'parent_id' => 51,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 54,
                'name' => 'settings_import',
                'text' => 'Importação de dados',
                'icon' => 'database-import',
                'url' => NULL,
                'parent_id' => 45,
                'order' => 4,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 55,
                'name' => 'gest_import_pessoal',
                'text' => 'Importar mão de obra',
                'icon' => NULL,
                'url' => 'config\\import_pessoal',
                'parent_id' => 54,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 56,
                'name' => 'gest_import_equip',
                'text' => 'Importar equipamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 54,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 57,
                'name' => 'gest_import_obras',
                'text' => 'Importar obras',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 54,
                'order' => 3,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 58,
                'name' => 'tracker',
                'text' => 'Eventos',
                'icon' => 'calendar-clock',
                'url' => NULL,
                'parent_id' => 45,
                'order' => 5,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 59,
                'name' => 'tracker_viewer',
                'text' => 'Visualizar eventos',
                'icon' => NULL,
                'url' => 'config\\event_tracker',
                'parent_id' => 58,
                'order' => 1,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-12 15:21:53'
            ]);
            Module::create([
                'id' => 60,
                'name' => 'departamentos',
                'text' => 'Departamentos',
                'icon' => NULL,
                'url' => 'config\\departamentos',
                'parent_id' => 49,
                'order' => 2,
                'created_at' => '2022-03-12 15:21:53',
                'updated_at' => '2022-03-27 12:31:21'
            ]);
            Module::create([
                'id' => 61,
                'name' => 'export_registo_diario',
                'text' => 'Exportar registo diário',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 2,
                'order' => 2,
                'created_at' => '2022-03-19 17:57:47',
                'updated_at' => '2022-03-19 17:57:47'
            ]);
            Module::create([
                'id' => 66,
                'name' => 'create_user',
                'text' => 'Criar utilizador',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 47,
                'order' => 1,
                'created_at' => '2022-03-25 23:11:34',
                'updated_at' => '2022-03-26 12:26:29'
            ]);
            Module::create([
                'id' => 67,
                'name' => 'update_user',
                'text' => 'Alterar utilizador',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 47,
                'order' => 3,
                'created_at' => '2022-03-25 23:12:12',
                'updated_at' => '2022-03-27 09:38:40'
            ]);
            Module::create([
                'id' => 68,
                'name' => 'delete_user',
                'text' => 'Eliminar utilizador',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 47,
                'order' => 4,
                'created_at' => '2022-03-25 23:12:30',
                'updated_at' => '2022-03-27 09:38:39'
            ]);
            Module::create([
                'id' => 69,
                'name' => 'view_user',
                'text' => 'Visualizar utilizador',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 47,
                'order' => 2,
                'created_at' => '2022-03-27 09:38:31',
                'updated_at' => '2022-03-27 12:34:17'
            ]);
            Module::create([
                'id' => 70,
                'name' => 'create_users_group',
                'text' => 'Criar grupo de utilizadores',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 48,
                'order' => 1,
                'created_at' => '2022-03-27 10:47:39',
                'updated_at' => '2022-03-27 10:47:39'
            ]);
            Module::create([
                'id' => 71,
                'name' => 'view_users_group',
                'text' => 'Visualizar grupo de utilizadores',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 48,
                'order' => 2,
                'created_at' => '2022-03-27 10:48:11',
                'updated_at' => '2022-03-27 12:34:27'
            ]);
            Module::create([
                'id' => 72,
                'name' => 'update_users_group',
                'text' => 'Alterar grupo de utilizadores',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 48,
                'order' => 3,
                'created_at' => '2022-03-27 10:48:40',
                'updated_at' => '2022-03-27 10:48:40'
            ]);
            Module::create([
                'id' => 73,
                'name' => 'delete_users_group',
                'text' => 'Eliminar grupo de utilizadores',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 48,
                'order' => 4,
                'created_at' => '2022-03-27 10:49:01',
                'updated_at' => '2022-03-27 10:49:01'
            ]);
            Module::create([
                'id' => 74,
                'name' => 'view_departamentos',
                'text' => 'Visualizar departamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 60,
                'order' => 2,
                'created_at' => '2022-03-27 12:31:47',
                'updated_at' => '2022-03-27 12:34:00'
            ]);
            Module::create([
                'id' => 75,
                'name' => 'update_departamentos',
                'text' => 'Alterar departamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 60,
                'order' => 3,
                'created_at' => '2022-03-27 12:32:53',
                'updated_at' => '2022-03-27 12:33:55'
            ]);
            Module::create([
                'id' => 76,
                'name' => 'create_departamentos',
                'text' => 'Criar departamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 60,
                'order' => 1,
                'created_at' => '2022-03-27 12:33:49',
                'updated_at' => '2022-03-27 12:34:00'
            ]);
            Module::create([
                'id' => 77,
                'name' => 'delete_departamentos',
                'text' => 'Eliminar departamentos',
                'icon' => NULL,
                'url' => NULL,
                'parent_id' => 60,
                'order' => 4,
                'created_at' => '2022-03-27 12:34:49',
                'updated_at' => '2022-03-27 12:34:49'
            ]);
        }
    }
}
