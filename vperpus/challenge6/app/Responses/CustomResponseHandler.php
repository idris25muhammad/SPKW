<?php

namespace App\Responses;

class CustomResponseHandler
{

    public function is200Response($response,$responseMessage,$flag="")
    {   
        if($flag!="") {
            $responseMessage = json_encode(["success"=>true,"flag"=>$flag,"result"=>$responseMessage]);
        }
        else {
            $responseMessage = json_encode(["success"=>true,"result"=>$responseMessage]);
        }

        $response->getBody()->write($responseMessage);
        return $response->withHeader("Content-Type","application/json")
        ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withStatus(200);
    }


    public function is400Response($response,$responseMessage)
    {
        $responseMessage = json_encode(["success"=>false,"result"=>$responseMessage]);
        $response->getBody()->write($responseMessage);
        return $response->withHeader("Content-Type","application/json")
        ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withStatus(400);
    }

    public function is422Response($response,$responseMessage)
    {
        $responseMessage = json_encode(["success"=>true,"result"=>$responseMessage]);
        $response->getBody()->write($responseMessage);
        return $response->withHeader("Content-Type","application/json")
            ->withStatus(422);
    }

    public function is405Response($response,$responseMessage)
    {
        $responseMessage = json_encode(["success"=>false,"result"=>$responseMessage]);
        $response->getBody()->write($responseMessage);
        return $response->withHeader("Content-Type","application/json")
            ->withStatus(405);
    }

  
}