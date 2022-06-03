<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function  compras(){
        $user = Auth::user();
        $carrinho = Compra::where([
            'user_id'=>Auth::id(),
            'status' => 'aberto',
        ]);
        return view('compra.index', compact('carrinho', 'user'));
    }
}
