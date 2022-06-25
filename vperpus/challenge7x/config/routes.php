<?php

use Slim\App;

use App\Controllers\JournalController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{
    $app->get("/api/journals",[JournalController::class,'getAllJournals']);
};