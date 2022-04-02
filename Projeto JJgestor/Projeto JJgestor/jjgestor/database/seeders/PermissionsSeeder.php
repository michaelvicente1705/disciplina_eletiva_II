<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
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
        ['descricao'=>'Funcionario'],
        ['descricao'=>'Cliente'],

    ];
}
