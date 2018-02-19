<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Seed roles
        DB::table('roles')->insert([
            'name' => 'admin',
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
    }
}
