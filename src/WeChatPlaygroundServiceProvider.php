<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground;

use Illuminate\Support\ServiceProvider;
use WeChatPlayground\EasyWeChat\OfficialAccount;

class WeChatPlaygroundServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/wechat-playground.php', 'wechat-playground'
        );

        $this->app->singleton(OfficialAccount::class, function ($app) {
            return new OfficialAccount($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'wechat-playground');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/wechat-playground'),
        ], 'wechat-playground-assets');
    }
}
