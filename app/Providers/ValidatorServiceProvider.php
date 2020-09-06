<?php

namespace App\Providers;

use App\Validators\IndividualEntrepreneurInnValidator;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app['validator']->extend('inn12', function ($attribute, $value, $parameters) {
            $validator = new IndividualEntrepreneurInnValidator();
            return $validator->isValid($value);
        });
    }

    public function register()
    {
        //
    }
}
