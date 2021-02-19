<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'Admin',
            'username'          => 'admin',
            'email'             => 'admin@panel.com',
            'password'          => bcrypt('admin123'),
            'remember_token'    => Str::random(15),
        ]);
    }
}
