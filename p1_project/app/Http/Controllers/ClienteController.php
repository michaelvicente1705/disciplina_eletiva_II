<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        Gate::authorize("acesso-cliente");
        return view("cliente.index");

    }
}
