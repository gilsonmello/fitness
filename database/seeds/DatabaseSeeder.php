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

        //Seeds questions
        DB::table('questions')->insert([
            'note' => '<p>Alguma vez seu médico disse que você possui algum problema de coração e recomendou que você só praticasse atividade física sob prescrição médica?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Você sente dor no peito causada pela prática de atividade física?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Você sentiu dor no peito no último mês?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Você tende a perder a consciência ou cair como resultado do treinamento?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Você tem algum problema ósseo ou muscular que poderia ser agravado com a prática de atividades físicas?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Seu médico já recomendou o uso de medicamentos para controle de sua pressão arterial ou condição cardiovascular?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Você tem consciência, através de sua própria experiência e/ou de aconselhamento médico, de alguma outra razão física que impeça a realização de atividades físicas?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('questions')->insert([
            'note' => '<p>Gostaria de comentar algum outro problema de saúde seja de ordem física ou psicológica que impeça a sua participação na atividade proposta?</p>',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Seeds question_groups
        DB::table('question_groups')->insert([
            'title' => "Par'q",
            'description' => "Par'q",
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 1,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 2,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 3,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 4,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 5,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 6,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 7,
            'question_group_id' => 1,
        ]);

        //Seeds question_groups
        DB::table('question_group_question')->insert([
            'question_id' => 8,
            'question_group_id' => 1,
        ]);
    }
}
