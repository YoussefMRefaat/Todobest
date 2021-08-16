<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path to the "home" route for the application.
     * This is used by Laravel authentication system to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/todo/index';

    /**
     * Controllers' namespace for the application.
     * If it's presented, declarations of controllers' routes will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        $this->configureRateLimiting();

        $this->routes(function () {

            /**
             * Add the main file of API routes
             */
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/api.php'));

            /**
             * Add the file of todos' routes through API
             */
            Route::prefix('api/todos')
                ->middleware(['api' , 'auth:sanctum'])
                ->namespace('App\\Http\\Controllers\\ApiControllers\\Todo')
                ->group(base_path('routes/api/todo.php'));

            /**
             * Add the file of user's routes through API
             */
            Route::prefix('api/user')
                ->middleware(['api' , 'auth:sanctum'])
                ->namespace('App\\Http\\Controllers\\ApiControllers\\User')
                ->group(base_path('routes/api/user.php'));


            /**
             * Add the main file of web routes
             */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web/web.php'));

            /**
             * Add the file of user's routes through web
             * Add the file of todos' routes through web
             */
            Route::prefix('/user')
                ->middleware(['web', 'auth'])
                ->namespace('App\\Http\\Controllers\\WebControllers\\User')
                ->group(base_path('routes/web/user.php'));

            /**
             * Add the file of todos' routes through web
             */
            Route::prefix('/todos')
                ->middleware(['web', 'auth'])
                ->namespace('App\\Http\\Controllers\\WebControllers\\Todo')
                ->group(base_path('routes/web/todo.php'));
        });


        /**
         * Validate id param in all routes
         */
        Route::pattern('id' , '\d+');

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
