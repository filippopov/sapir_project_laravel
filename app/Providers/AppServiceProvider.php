<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Game\Player;
use App\Game\WildBeasts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Player::class, function(){
            return new Player('Vaderus');
        });
        
        $this->app->singleton(WildBeasts::class, function(){
            return new WildBeasts('Wild Beast');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
