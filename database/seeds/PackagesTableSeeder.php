<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'categorie_id' => 1,
            'name' => 'Simples',
            'slug' => 'simples',
            'description' => 'Pacote Simples',
            'validity' => 30,
            'value' => 25.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('packages')->insert([
            'categorie_id' => 2,
            'name' => 'Completo',
            'slug' => 'completo',
            'description' => 'Pacote Completo',
            'validity' => 30,
            'value' => 45.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('packages')->insert([
            'categorie_id' => 3,
            'name' => 'Premium',
            'slug' => 'premium',
            'description' => 'Pacote Premium',
            'validity' => 30,
            'value' => 60.00,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
