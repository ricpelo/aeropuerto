<?php

namespace App\Providers;

use App\Models\Vuelo;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('asiento_libre', function($attribute, $value, $parameters, $validator) {
            $vuelo = Vuelo::find($parameters[0]);
            $asiento = $value;
            return !in_array($asiento, $vuelo->reservas()->pluck('asiento')->all());
        });
    }
}
