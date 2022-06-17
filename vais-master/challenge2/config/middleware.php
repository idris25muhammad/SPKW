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
    
    $app->add(
        new \Tuupola\Middleware\JwtAuthentication([
            "path" => ["/api"],
            "ignore"=> ["/api/v2/login"],
            "algorithm" => ["HS256", "RS256"],
            "secret"=> SecretKeyInterface::JWT_PUBLIC_KEY,
            "secure"=>false,
            "attribute" => "jwt",
            "error"=> function($response,$arguments)
            {
                $data["success"] = false;
                $data["response"]= $arguments["message"];
                $data["status_code"]= "401";
  
                return $response->withHeader("Content-type","application/json")
                    ->getBody()->write(json_encode($data,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ));
            }
        ])
    );


    $app->addRoutingMiddleware();
    $app->add(new TrailingSlash());
        
    $app->addErrorMiddleware(true,true,true);
};