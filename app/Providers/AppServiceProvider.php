<?php

namespace App\Providers;

use App\Listeners\EnviarCorreo;
use Illuminate\Support\ServiceProvider;
//use Symfony\Contracts\EventDispatcher\Event;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //* Manejar la escucha del evento cuando un usuario inicia sesión
        Event::listen(Login::class, EnviarCorreo::class);
    }
}
