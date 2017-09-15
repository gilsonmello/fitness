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
            'name' => 'Gilson de Melo',
            'email' => 'junnyorr.sirnandes@gmail.com',
            'birth_date' => '1994-12-31',
            'cpf' => '073.011.215-20',
            'rg' => '13.610.029-56',
            'password' => bcrypt('123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriele dos Santos Miranda',
            'email' => 'gabrieledsmiranda@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        //$this->call(UsersTableSeeder::class);


        //Seed roles
        DB::table('roles')->insert([
            'name' => 'adm',
            'label' => 'Administrador',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'name' => 'clients',
            'label' => 'Clientes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        /*
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
        ]);*/

        //Seed role_user
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
       /* DB::table('role_user')->insert([
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
        ]);*/

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
        /*DB::table('permissions')->insert([
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

        DB::table('evaluations')->insert([
            'user_id' => 1,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tests')->insert([
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);*/

        
        DB::table('measures')->insert([
            'id' => 1,
            'name' => 'Kilo',
            'initials' => 'KG',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 2,
            'name' => 'Centímetros',
            'initials' => 'CM',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 3,
            'name' => 'Metros',
            'initials' => 'M',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 4,
            'name' => 'Frequência Cardíaca Máxima',
            'initials' => 'FCM',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 5,
            'name' => 'Vo 2 Treino',
            'initials' => 'Vo2 T',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 6,
            'name' => 'Zona Alvo',
            'initials' => 'ZN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 1,
            'measure_id' => 4,
            'name' => 'Karnovem',
            'formula' => '220-idade',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 2,
            'measure_id' => 5,
            'name' => 'Vo2 Treino',
            'formula' => '(((porcentagem_intensidade*350)+vo2_maximo)/350)*vo2_maximo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 3,
            'measure_id' => 6,
            'name' => 'Zona Alvo',
            'formula' => '(rfc*porcentagem_objetivo)+fcr',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
