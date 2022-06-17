<?php

use Slim\App;
use App\Controllers\UserController;
use App\Controllers\AutentikasiController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
 
    $app->group('/api/v2', function (RouteCollectorProxy $group) {
        $group->post("/login",[AutentikasiController::class,"loginUser"]);
        $group->get("/profile",[UserController::class,"viewDetailUser"]);
    });

};