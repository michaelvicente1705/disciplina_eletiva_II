<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $fillable = ['descricao'];

    public function user()
    {
        return $this->hasMany(User::class, 'permission_user', 'id_user');
    }

}
