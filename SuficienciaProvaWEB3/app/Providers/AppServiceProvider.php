<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapa de políticas da aplicação.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registra quaisquer serviços de autenticação / autorização.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate que permite apenas administradores gerenciarem produtos e categorias
        Gate::define('manage-products-categories', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
