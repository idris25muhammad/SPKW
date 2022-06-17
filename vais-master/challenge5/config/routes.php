<?php

use Slim\App;
use App\Controllers\AnnouncementController;

use Slim\Routing\RouteCollectorProxy;

return function (App $app)
{ 
    $app->group('/api/v2', function (RouteCollectorProxy $group) {
        $group->get("/announcements",[AnnouncementController::class,'viewAllAnnouncements']);
        $group->get("/announcement/latest",[AnnouncementController::class,'viewLatestAnnouncement']);
        $group->get("/announcement/{id}",[AnnouncementController::class,'viewDetailAnnouncement']);
        $group->delete("/announcements",[AnnouncementController::class,'deleteAnnouncement']);
        
    });

};