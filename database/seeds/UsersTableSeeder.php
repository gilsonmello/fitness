<?php

use Illuminate\Database\Seeder;
use App\Model\Backend\User;
/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create();
    }
}
