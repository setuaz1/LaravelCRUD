<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'AdminPanelMiddleware' => \App\Http\Middleware\AdminPanelMiddleware::class,
            'AdminPolicy' => \App\Http\Middleware\AdminPolicy::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'http://127.0.0.1:8000/posts/create',
            'http://127.0.0.1:8000/posts/*'
        ]);
//        $middleware->validateCsrfTokens([
//            '/posts'
//        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
