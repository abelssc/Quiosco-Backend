<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Pedido;
use App\Models\Producto;
use App\Policies\PedidoPolicy;
use App\Policies\ProductoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Pedido::class => PedidoPolicy::class,
        Producto::class => ProductoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
