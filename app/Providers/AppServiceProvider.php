<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;

use App\Models\Messagerie;
use App\Models\Pub;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pubSimples = Pub::where('type', 'simple')->where('statut', 1)->inRandomOrder()->limit(20)->get();
        // Using view composer to set following variables globally
        view()->composer('*',function($view) use($pubSimples) {
            $view->with('pubSimples', $pubSimples);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
