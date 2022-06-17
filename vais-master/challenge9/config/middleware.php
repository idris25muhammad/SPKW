<?php
use Slim\App;
use App\Interfaces\SecretKeyInterface;
use Middlewares\TrailingSlash;

return function (App $app)
{
    $app->getContainer()->get('settings');
    
    $app->add(new Tuupola\Middleware\CorsMiddleware([
        "origin" => ["*"],
        "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
        "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since", "jwt"],
        "headers.expose" => [],
        "credentials" => true,
        "cache" => 0,
    ]));
 
    $app->addRoutingMiddleware();
    $app->add(new TrailingSlash());
        
    $app->addErrorMiddleware(false,false,false);
};