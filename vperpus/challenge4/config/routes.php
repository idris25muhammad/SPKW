<?php

use Slim\App;

use App\Controllers\BookController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
    $app->get("/api/books",[BookController::class,'getAllBooks']);
};