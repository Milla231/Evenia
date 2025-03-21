<?php

namespace App\Providers;

use App\Models\Evenement;
use Illuminate\Support\ServiceProvider;

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
        
        view()->composer('pages/site/pages/home', function ($view) {
         
            $evenements = Evenement::where('status', '!=', 'supprimé')->get();

            $view->with('evenements', $evenements); // Partager les témoignages avec la vue
        });

    }
}
