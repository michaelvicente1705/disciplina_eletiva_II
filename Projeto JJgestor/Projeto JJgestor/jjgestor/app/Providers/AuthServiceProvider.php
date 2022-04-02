<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        Gate::define('administrador', function(User $user){
            $permissao= $user->permissions;
            return $permissao->descricao == "Administrador"
                ? Response::allow()
                : Response::deny();
        });
//
//        Gate::define('funcionario', function(User $user){
//
//            $permissao= $user->permissions;
//            return $permissao->descricao =="Funcionario"
//                ? Response::allow()
//                : Response::deny();
//        });
//
//
//
//        Gate::define('acesso-cliente', function(User $user){
//
//            $permissao= $user->permissions;
//            return $permissao->descricao == "Cliente"
//                ? Response::allow()
//                : Response::deny();
//        });
    }
}
