<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeds users
        DB::table('users')->insert([
            'name' => 'Junior de Melo',
            'email' => 'junnyorr.sirnandes@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Gilson de Melo',
            'email' => 'junior140._-@hotmail.com',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        //Seed roles
        DB::table('roles')->insert([
            'name' => 'adm',
            'label' => 'Administrador',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'name' => 'manager',
            'label' => 'Gerenciador',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'name' => 'edit',
            'label' => 'Editor',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'name' => 'publish',
            'label' => 'Publicador',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seed role_user
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 3,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seed news
        DB::table('news')->insert([
            'user_id' => 1,
            'title' => 'Teste 1',
            'slug' => 'teste-1',
            'description' => 'Teste 1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'user_id' => 1,
            'title' => 'Teste 2',
            'slug' => 'teste-2',
            'description' => 'Teste 2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'user_id' => 2,
            'title' => 'Teste 3',
            'slug' => 'teste-3',
            'description' => 'Teste 3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'user_id' => 2,
            'title' => 'Teste 4',
            'slug' => 'teste-4',
            'description' => 'Teste 4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seeds permissions
        DB::table('permissions')->insert([
            'name' => 'backend.view',
            'label' => 'Visualizar Backend',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.question_grupo.create',
            'label' => 'Criar grupo de questões',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.question_group.index',
            'label' => 'Listagem de Grupo de Questões',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'backend.question_group.update',
            'label' => 'Editar de Grupo de Questões',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seeds permission_role
        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 3,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 4,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seeds question_groups
        DB::table('question_groups')->insert([
            'title' => 'Grupo 1',
            'description' => 'Descrição do grupo 1',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('question_groups')->insert([
            'title' => 'Grupo 2',
            'description' => 'Descrição do grupo 2',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('question_groups')->insert([
            'title' => 'Grupo 3',
            'description' => 'Descrição do grupo 3',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
