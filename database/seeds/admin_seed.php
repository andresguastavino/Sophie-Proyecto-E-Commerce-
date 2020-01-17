<?php

use Illuminate\Database\Seeder;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'name' => 'Admin',
         'surname' => 'Admin',
         'email' => 'admin@admin.com',
         'password' => bcrypt('admin'),
         'avatar' => 'default.png',
         'admin' => 1,
        ]);
    }
}
