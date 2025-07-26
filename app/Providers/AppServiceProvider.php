<?php

namespace App\Providers;

use App\Http\Middleware\authCheck;
use Illuminate\Support\Facades\Route;
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
        Route::middleware('web')
        ->middleware([
            'authCheck' => authCheck::class, // <-- Yahan register karo
        ])
        ->group(base_path('routes/web.php'));
    }
}
