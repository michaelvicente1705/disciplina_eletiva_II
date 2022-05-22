<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $permission) {
            Permissions::create($permission);
        }
    }
    private $permissions = [

        ['descricao'=>'Administrador'],
        ['descricao'=>'Cliente'],

    ];
}
