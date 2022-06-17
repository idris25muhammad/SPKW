<?php

use Slim\App;

use App\Controllers\GradeController;

use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
    $app->group('/api/v2', function (RouteCollectorProxy $group) {
        $group->get("/grade/{id_mahasiswa}",[GradeController::class,'viewStudentGrade']);
    });

};