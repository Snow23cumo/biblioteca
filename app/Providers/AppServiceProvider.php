<?php

namespace App\Providers;


use App\Models\Admin\Menu;
use Illuminate\Support\Facades\view;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // mostrar el menu
        view::composer("theme.lte.aside", function($view){
            $menus = Menu::getMenu(true);
            $view->with('menusComposer',$menus);
        });
        // Integrando la plantilla
        view()->share('theme', 'lte');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
