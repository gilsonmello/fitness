<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('suppliers')->insert([
            'name' => 'Físicos',
            'address' => 'Rua Vinte e Um de Abril',
            'number' => '198',
            'district' => 'Centro',
            'city' => 'Candeias',
            'state' => 'BA',
            'country' => 'Brasil',
            'phone' => '(71) 4062-9299',
            'operation' => 'Seg a Sex: 5:30-10:30 · Seg a Sex: 15:00-21:00 · Sáb: 7:00-10:00',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Espaço do Corpo',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Reflexos',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Indefinido',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
    }
}
