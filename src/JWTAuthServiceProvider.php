<?php

namespace RaditzFarhan\SimpleJWTAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class JWTAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/simple_jwt_auth.php' => $this->configPath('simple_jwt_auth.php'),
        ]);

        Auth::extend('simple-jwt-auth', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...

            return new JwtGuard(new JWTAuth, Auth::createUserProvider($config['provider']), $app->request);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/simple_jwt_auth.php',
            'simple_jwt_auth'
        );

        // Register the service the package provides.
        $this->app->singleton('JWTAuth', function ($app) {
            return new JWTAuth;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['JWTAuth'];
    }

    public function configPath($file)
    {
        if (function_exists('config_path')) {
            return config_path($file);
        } else {
            return base_path($file);
        }
    }
}
