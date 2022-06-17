<?php

use Slim\App;
use App\Controllers\UserController;
use App\Controllers\AutentikasiController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
    $app->group('/api/v1', function (RouteCollectorProxy $group) {
        $group->get("/lecturers",[UserController::class,"viewAllLecturer"]);
    });
};