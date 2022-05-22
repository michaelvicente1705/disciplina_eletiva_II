<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' =>'administrador@gmail.com',
            'password' => Hash::make('mikefern'),
        ]);
        DB::table('user_has_permission')->insert([
            'permission_id' => 1,
            'user_id' => 1,

        ]);
    }
}
