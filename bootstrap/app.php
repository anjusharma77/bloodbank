<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\BloodSample;
use App\Http\Middleware\Logincheck;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->alias([
        //     'auth' => \App\Http\Middleware\Logincheck::class,
        //     'addsample' => \App\Http\Middleware\BloodSample::class,
        // ]);
        
    //    $middleware->append(BloodSample::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
