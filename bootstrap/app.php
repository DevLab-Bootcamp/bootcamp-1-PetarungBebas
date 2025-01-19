<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

            $middleware->validateCsrfTokens(
                except: [
                    'stripe/*', // Semua rute yang dimulai dengan 'stripe/'
                    'http://example.com/foo/bar', // Rute spesifik
                    'http://example.com/foo/*', // Semua rute di bawah '/foo/'
                    'api/*' // Semua rute yang dimulai dengan 'api/'
                ]
            );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
