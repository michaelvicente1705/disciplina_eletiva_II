<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class Produto extends Model
{
    use HasFactory;



    protected $fillable = ['nome', 'categorias_id', 'descricao',
                            'valor',  'caminho_foto'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


}
