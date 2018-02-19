<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_modules')->insert([
            'id' => 1,
            'name' => 'Área administrativa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 2,
            'name' => 'Pacotes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 3,
            'name' => 'Agendas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 4,
            'name' => 'Horas da Agenda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 5,
            'name' => 'Usuários',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 6,
            'name' => trans('crud.evaluations.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 7,
            'name' => trans('crud.protocols.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 8,
            'name' => trans('crud.tags.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 9,
            'name' => trans('crud.categories.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 10,
            'name' => trans('crud.tests.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_modules')->insert([
            'id' => 11,
            'name' => trans('crud.roles.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        //Seeds permissions
        DB::table('permissions')->insert([
            'permission_module_id' => 1,
            'name' => 'backend.view',
            'label' => 'Visualizar Área Administrativa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.packages.index',
            'permission_module_id' => 2,
            'label' => 'Listagem de Pacotes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.packages.create',
            'permission_module_id' => 2,
            'label' => 'Criar Pacotes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.packages.edit',
            'permission_module_id' => 2,
            'label' => 'Editar Pacotes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.packages.destroy',
            'permission_module_id' => 2,
            'label' => 'Deletar Pacotes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Agendas
        DB::table('permissions')->insert([
            'name' => 'backend.diaries.index',
            'permission_module_id' => 3,
            'label' => 'Listagem de Agendas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diaries.create',
            'permission_module_id' => 3,
            'label' => 'Cria de Agenda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diaries.edit',
            'permission_module_id' => 3,
            'label' => 'Editar Agenda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diaries.destroy',
            'permission_module_id' => 3,
            'label' => 'Deletar Agenda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Agendas


        //Horas da Agenda
        DB::table('permissions')->insert([
            'name' => 'backend.diary_hours.index',
            'permission_module_id' => 4,
            'label' => 'Listagem de Horas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diary_hours.create',
            'permission_module_id' => 4,
            'label' => 'Criar Hora',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diary_hours.edit',
            'permission_module_id' => 4,
            'label' => 'Editar Hora',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.diary_hours.destroy',
            'permission_module_id' => 4,
            'label' => 'Deletar Hora',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Horas da Agenda


        //Usuários
        DB::table('permissions')->insert([
            'name' => 'backend.auth.index',
            'permission_module_id' => 5,
            'label' => 'Usuários',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.auth.create',
            'permission_module_id' => 5,
            'label' => 'Criar Usuário',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.auth.edit',
            'permission_module_id' => 5,
            'label' => 'Editar Usuário',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.auth.destroy',
            'permission_module_id' => 5,
            'label' => 'Deletar Usuário',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Usuários


        //Avaliações
        DB::table('permissions')->insert([
            'name' => 'backend.evaluations.index',
            'permission_module_id' => 6,
            'label' => trans('crud.evaluations.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.evaluations.create',
            'permission_module_id' => 6,
            'label' => trans('crud.evaluations.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.evaluations.edit',
            'permission_module_id' => 6,
            'label' => trans('crud.evaluations.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.evaluations.destroy',
            'permission_module_id' => 6,
            'label' => trans('crud.evaluations.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Avaliações


        //Protocolos
        DB::table('permissions')->insert([
            'name' => 'backend.protocols.index',
            'permission_module_id' => 7,
            'label' => trans('crud.protocols.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.protocols.create',
            'permission_module_id' => 7,
            'label' => trans('crud.protocols.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.protocols.edit',
            'permission_module_id' => 7,
            'label' => trans('crud.protocols.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.protocols.destroy',
            'permission_module_id' => 7,
            'label' => trans('crud.protocols.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Protocolos

        //Tags
        DB::table('permissions')->insert([
            'name' => 'backend.tags.index',
            'permission_module_id' => 8,
            'label' => trans('crud.tags.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tags.create',
            'permission_module_id' => 8,
            'label' => trans('crud.tags.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tags.edit',
            'permission_module_id' => 8,
            'label' => trans('crud.tags.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tags.destroy',
            'permission_module_id' => 8,
            'label' => trans('crud.tags.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Tags

        //Categorias
        DB::table('permissions')->insert([
            'name' => 'backend.categories.index',
            'permission_module_id' => 9,
            'label' => trans('crud.categories.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.categories.create',
            'permission_module_id' => 9,
            'label' => trans('crud.categories.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.categories.edit',
            'permission_module_id' => 9,
            'label' => trans('crud.categories.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.categories.destroy',
            'permission_module_id' => 9,
            'label' => trans('crud.categories.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Categorias

        //Testes
        DB::table('permissions')->insert([
            'name' => 'backend.tests.index',
            'permission_module_id' => 10,
            'label' => trans('crud.tests.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tests.create',
            'permission_module_id' => 10,
            'label' => trans('crud.tests.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tests.edit',
            'permission_module_id' => 10,
            'label' => trans('crud.tests.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.tests.destroy',
            'permission_module_id' => 10,
            'label' => trans('crud.tests.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Categorias

        //Perfis
        DB::table('permissions')->insert([
            'name' => 'backend.roles.index',
            'permission_module_id' => 11,
            'label' => trans('crud.roles.index'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.roles.create',
            'permission_module_id' => 11,
            'label' => trans('crud.roles.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.roles.edit',
            'permission_module_id' => 11,
            'label' => trans('crud.roles.edit'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.roles.destroy',
            'permission_module_id' => 11,
            'label' => trans('crud.roles.create'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //Fim Perfis

        
        //Seeds permission_role
        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 2
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 2
        ]);
    }
}
