<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\facades\View;//crio meu USE para fazer a requeisição da minhas views
use Illuminate\Support\facades\Blade;//crio um novo use para fazer a requisição da minha BLADE
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //determino minha variável global 'VERSAO' e passo u valor para ela
        View::share('versao', '0.1');
        blade::component('components.alert', 'alert');
    }
}
