<?php

namespace ChongEric\ApiCleaner\Providers;

use Illuminate\Support\ServiceProvider;
use ChongEric\ApiCleaner\Middleware\ApiAuthMiddleware;

class ApiCleanerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->app->make('ChongEric\ApiCleaner\Controllers\HelloWorldController');

        $this->loadViewsFrom(__DIR__.'/../views', 'ChongEric');
    }

    /**
     * Bootstrap services.
     * 服务
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . '../public' => public_path('chongeric'),
        ], 'public');

        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . '../config' . DIRECTORY_SEPARATOR . 'api-cleaner.php' => config_path('api-cleaner.php'),
        ], 'config');


        $this->addMiddlewareAlias('chong.api', ApiAuthMiddleware::class);

    }

    # 添加中间件的别名方法
    protected function addMiddlewareAlias($name, $class)
    {
        $router = $this->app['router'];

        if (method_exists($router, 'aliasMiddleware')) {
            return $router->aliasMiddleware($name, $class);
        }

        return $router->middleware($name, $class);
    }
}
