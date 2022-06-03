<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function  dashboard(){
        Gate::authorize("acesso-administrador");
        return view(dashboard);
    }
}
