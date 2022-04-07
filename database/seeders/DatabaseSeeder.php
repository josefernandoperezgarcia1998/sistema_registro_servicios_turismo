<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('Users')->insert([
            'name'  => 'José Fernando Pérez García',
            'password'  => bcrypt('123'),
            'rol' => 'Admin',
            'activo' => 'Yes',
            'email'     => 'josefernandoperezgarcia98@gmail.com',
        ]);
    }
}
