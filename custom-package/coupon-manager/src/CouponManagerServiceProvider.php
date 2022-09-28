<?php

namespace Mashfiqdev\CouponManager;

use Illuminate\Support\ServiceProvider;

class CouponManagerServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        
        
    }

    public function register(){
        $this->mergeConfigFrom(
            __DIR__.'/config/coupon.php', 'courier'
        );
    }
}