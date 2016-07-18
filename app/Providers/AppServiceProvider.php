<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::deleting(function($user){
            return $user->books()->update(['user_id'=>0]);
        });

//        DB::listen(function ($query) {var_dump($query->sql);});
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
