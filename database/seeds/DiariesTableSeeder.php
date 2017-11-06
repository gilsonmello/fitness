<?php

use Illuminate\Database\Seeder;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            'supplier_id' => 1,
            'available_date' => date('Y-m-d'),
            'description' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $hour = strtotime(date('H:i')) + 60 * 60;
        $minute = date('i');
        $second = date('s');

        DB::table('diary_hours')->insert([
            'diary_id' => 1,
            'available_hour' => date('H:i', $hour),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $hour = strtotime(date('H:i', $hour)) + 60 * 60;
        $minute = date('i');
        $second = date('s');

        DB::table('diary_hours')->insert([
            'diary_id' => 1,
            'available_hour' => date('H:i', $hour),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
