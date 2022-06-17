<?php
namespace App\Controllers;

use App\Interfaces\SecretKeyInterface;
use Firebase\JWT\JWT;
use App\Controllers\UserController;

class JWTController implements SecretKeyInterface
{
    public static function generateToken($noinduk)
    {
      
        $privateKey = SecretKeyInterface::JWT_PRIVATE_KEY;

        $publicKey =  SecretKeyInterface::JWT_PUBLIC_KEY;

        $now = time();
        
        $user =  new UserController();
        $role = $user->getUserRole($noinduk);

        $payload = [
            "no_induk"=>$noinduk,
            "role"=>$role,
            "iat"=>$now
        ];

        $jwte = JWT::encode($payload,$privateKey,"RS256");
        
        $resp["no_induk"] = $noinduk;
        $resp["accessToken"] = $jwte;
        $resp["isLoggedIn"] = true;

        return $resp;
    }
   
}