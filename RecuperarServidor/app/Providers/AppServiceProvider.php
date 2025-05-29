<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckApiToken;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Route::middleware('check.api.token', CheckApiToken::class);
    }
}
