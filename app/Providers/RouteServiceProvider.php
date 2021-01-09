<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapUserRoutes();

        $this->mapPermissionRoutes();

        $this->mapRoleRoutes();

        $this->mapStaffRoutes();

        $this->mapCustomerRoutes();

        $this->mapPositionRoutes();

        $this->mapWedEventsRoutes();

        $this->mapCardsRoutes();

        $this->mapTransactionsRoutes();

        $this->mapStatsRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

    /**
     * Define the "user" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapUserRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php'));
    }

    protected function mapRoleRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/roles.php'));
    }

    protected function mapPermissionRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/permissions.php'));
    }

    protected function mapStaffRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/staffs.php'));
    }

    protected function mapCustomerRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/customers.php'));
    }

    protected function mapPositionRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/positions.php'));
    }

    protected function mapWedEventsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/wedevents.php'));
    }

    protected function mapCardsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/cards.php'));
    }

    protected function mapTransactionsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/transactions.php'));
    }

    protected function mapStatsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','role:Admin','role:Owner'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/stats.php'));
    }
}
