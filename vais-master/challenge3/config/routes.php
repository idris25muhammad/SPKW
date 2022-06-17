<?php

use Slim\App;

use App\Controllers\MahasiswaController;
use App\Controllers\DosenController;

use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
   
    $app->group('/api/v2', function (RouteCollectorProxy $group) {
        $group->get("/students",[MahasiswaController::class,'viewSemuaMahasiswa']);
        $group->get("/student/{id}",[MahasiswaController::class,'viewMahasiswa']);  

        $group->get("/lecturers",[DosenController::class,'viewSemuaDosen']);
        $group->get("/lecturer/{id}",[DosenController::class,'viewDosen']);  
      
    });

};