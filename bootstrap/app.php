<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            $centralDomains = config('tenancy.central_domains');

            foreach ($centralDomains as $domain) {
                Route::middleware('web')
                    ->domain($domain)
                    ->group(base_path('routes/web.php'));
            }

            Route::middleware('web')->group(base_path('routes/tenant.php'));
        },
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /*$middleware->prepend([
            // Even higher priority than the initialization middleware
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,

//            \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
            \Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain::class,
//            \Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain::class,
//            \Stancl\Tenancy\Middleware\InitializeTenancyByPath::class,
//            \Stancl\Tenancy\Middleware\InitializeTenancyByRequestData::class,
        ]);*/
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
