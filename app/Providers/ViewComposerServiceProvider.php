<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootNavigationView();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function bootNavigationView()
    {
        // Using Closure based composers...
        view()->composer('navigation', function ($view) {
            $user = Auth::user();
            $isLoggedIn = Auth::check();

            $viewData = [
                'user' => $user,
                'isLoggedIn' => $isLoggedIn,
            ];

            $view->with($viewData);
        });
    }
}
