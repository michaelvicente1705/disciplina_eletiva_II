<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status'];

    public function produto(){
        return $this->hasMany(Produto::class, 'user_id', 'id_user');
    }
}
