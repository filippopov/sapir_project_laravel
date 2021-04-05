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
        $this->app->bind(Player::class, function(){
            return new Player('Vaderus');
        });
        
        $this->app->bind(WildBeasts::class, function(){
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
