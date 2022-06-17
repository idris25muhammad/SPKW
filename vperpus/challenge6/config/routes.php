<?php

use Slim\App;
use App\Controllers\UserController;
use App\Controllers\AutentikasiController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
 
    //api versi2
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->post("/register",[UserController::class,"registrasiUser"]);
    });

};