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
        //

        $middleware->alias([
            'platinum' => \App\Http\Middleware\AuthCheck::class,
            'staff' => \App\Http\Middleware\StaffCheck::class,
            'mentor' => \App\Http\Middleware\MentorCheck::class,
            'mentorPlat' => \App\Http\Middleware\MentorPlatCheck::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
