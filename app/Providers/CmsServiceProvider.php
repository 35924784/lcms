<?php

/*
 * This file is part of the cms.
 *
 * (c) wanglele <wanglelecc@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console;
use App\Http\Middleware;

class CmsServiceProvider extends ServiceProvider
{

//    protected $defer = true;

    protected $commands = [
        Console\Commands\GenerateToken::class,
        Console\Commands\IndexArticle::class,
        Console\Commands\SyncBlock::class,
        Console\Commands\Uploader::class,
    ];

    protected $routeMiddleware = [
        'cms.frontend' => Middleware\FrontendRequests::class,
        'cms.auth' => Middleware\Authenticate::class,
    ];

    protected $middlewareGroups = [
        'cms' => [
            'cms.frontend',
            'cms.authenticated',
            'cms.auth',
        ],
    ];

    public function boot()
    {
        $this->loadCmsConfig();
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        // 注册模板变量
        $theme = is_mobile() ? config('theme.mobile') : config('theme.desktop');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/backend', 'backend');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/frontend/' . $theme, 'frontend');
    }

    public function register()
    {
        $this->registerRouteMiddleware();
        $this->commands($this->commands);
    }

    public function provides()
    {
    }

    /**
     * 加载配置文件
     */
    protected function loadCmsConfig()
    {
        // merge config
        $this->mergeConfigFrom(__DIR__ . '/../..//config/captcha.php', 'captcha');
        $this->mergeConfigFrom(__DIR__ . '/../../config/cache.php', 'cache');
        $this->mergeConfigFrom(__DIR__ . '/../../config/filesystems.php', 'filesystems');
        $this->mergeConfigFrom(__DIR__ . '/../../config/services.php', 'services');
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }


}
