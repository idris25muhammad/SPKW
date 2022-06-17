<?php
use Slim\App;
use App\Interfaces\SecretKeyInterface;
use Middlewares\TrailingSlash;

return function (App $app)
{
    $app->getContainer()->get('settings');
    $app->addRoutingMiddleware();
    $app->add(new TrailingSlash());

    $app->add(new Tuupola\Middleware\CorsMiddleware([
        "origin" => ["idris.com"],
        "methods" => ["GET"],
        "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since", "jwt"],
        "headers.expose" => [],
        "credentials" => true,
        "cache" => 0,
    ]));
    
   
    
    // $app->addErrorMiddleware(true,true,true);
};