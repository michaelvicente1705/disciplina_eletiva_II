<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor','nome' , 'categorias_id', 'fornecedors_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
