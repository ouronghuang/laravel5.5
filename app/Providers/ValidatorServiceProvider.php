<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^1\d{10}$/', $value);
        });

        Validator::extend('mobile_code', function ($attribute, $value, $parameters, $validator) {
            return $value == \Cache::get('mobile_code_' . \Request::input('mobile'));
        });

        Validator::extend('email_code', function ($attribute, $value, $parameters, $validator) {
            return $value == \Cache::get('email_code_' . \Request::input('email'));
        });
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
}
