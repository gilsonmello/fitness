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
            'email' => 'gilson@mirandafitness.com.br',
            'birth_date' => '1994-12-31',
            'cpf' => '073.011.215-20',
            'rg' => '13.610.029-56',
            'password' => bcrypt('jun10r'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriele dos Santos Miranda',
            'email' => 'gabriele.miranda@mirandafitness.com.br',
            'password' => bcrypt('81625358'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Usuário Teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('teste'),
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
            'name' => 'client',
            'label' => 'Cliente',
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
        
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 2,
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

        DB::table('measures')->insert([
            'id' => 7,
            'name' => 'Vo 2 Máximo',
            'initials' => 'Vo2 M',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 8,
            'name' => 'Frequência Cardíaca Reserva',
            'initials' => 'RFC',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 9,
            'name' => 'Repetição Máxima',
            'initials' => 'RM',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 10,
            'name' => 'Frequência Cardíaca Mínima',
            'initials' => 'FCN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('measures')->insert([
            'id' => 11,
            'name' => 'Banco de Wells',
            'initials' => 'BW',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

         DB::table('measures')->insert([
            'id' => 12,
            'name' => 'Flexiteste',
            'initials' => 'FLT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 1,
            'measure_id' => 4,
            'name' => 'Karvonem',
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

        DB::table('protocols')->insert([
            'id' => 4,
            'measure_id' => 7,
            'name' => 'Vo 2 Máximo',
            'formula' => 'vo2_maximo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 5,
            'measure_id' => 8,
            'name' => 'Frequência Cardíaca Reserva',
            'formula' => 'fcm-fcn',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 6,
            'measure_id' => 4,
            'name' => 'Frequencia Cardíaca Máxima',
            'formula' => 'fcm',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 7,
            'measure_id' => 10,
            'name' => 'Frequencia Cardíaca Mínima',
            'formula' => 'fcn',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 8,
            'measure_id' => 11,
            'name' => 'Banco de Wells',
            'formula' => 'banco_wells',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 9,
            'measure_id' => 12,
            'name' => 'Flexisteste',
            'formula' => 'flexisteste',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('protocols')->insert([
            'id' => 10,
            'measure_id' => 9,
            'name' => 'Repetição Máxima',
            'formula' => 'repeticao_maxima',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 1,
            'name' => 'Resistência',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 2,
            'name' => 'Flexibilidade',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 3,
            'name' => 'Frequência Máxima Cardíaca',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 4,
            'name' => 'Frequência Máxima Repouso',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 5,
            'name' => 'Frequência Máxima Reserva',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 6,
            'name' => 'Vo 2 Máximo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 7,
            'name' => 'Vo 2 Treino',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('type_tests')->insert([
            'id' => 8,
            'name' => 'Zona Alvo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $this->call(StatusPaymentTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(DiariesTableSeeder::class);

        DB::table('evaluations')->insert([
            'user_id' => 3,
            'validity' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
