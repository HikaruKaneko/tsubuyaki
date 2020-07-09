<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('space',function ($attribute,$value,$parameters){
            if(mb_ereg_match("^(\s|　)+$", $value)){
                return false;
            }else{
                return true;
            }
        });
    }
}
