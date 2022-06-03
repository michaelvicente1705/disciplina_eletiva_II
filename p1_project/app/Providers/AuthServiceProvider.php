<?php

namespace App\Providers;


use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
            $permissao= $user->permissions();

            return $user->permissions[0]->id === 1
                ? Response::allow()
                : Response::deny();
        });
        Gate::define('acesso-cliente', function(User $user){
            $permissao= $user->permissions();

            return $user->permissions[0]->id === 2
                ? Response::allow()
                : Response::deny();
        });
    }
}
