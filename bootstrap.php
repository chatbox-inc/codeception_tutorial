<?php
require_once __DIR__.'/vendor/autoload.php';

Dotenv::load(__DIR__);

$app = new Application(
    realpath(__DIR__)
);

$app->withEloquent();

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    ExceptionHandler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    ConoleKernel::class
);

$app->middleware([
    \Illuminate\Session\Middleware\StartSession::class,
]);


$app->get("users",UserAPI::class."@getList");
$app->get("users/{userId}",UserAPI::class."@getList");
$app->post("users/{userId}/update",UserAPI::class."@getList");
$app->post("users/{userId}/delete",UserAPI::class."@getList");

$app->get("count",SessionAPI::class."@getCount");
$app->get("count/reset",SessionAPI::class."@getReset");

return $app;