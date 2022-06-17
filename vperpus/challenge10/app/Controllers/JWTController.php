<?php
namespace App\Controllers;

use App\Interfaces\SecretKeyInterface;
use Firebase\JWT\JWT;
use App\Controllers\UserController;

class JWTController implements SecretKeyInterface
{
    public static function generateToken($noinduk)
    {
        $secretKey = self::JWT_HS256_SECRET_KEY;
        $now = time();
        $future = strtotime('+1 hour',$now);
        
        $user =  new UserController();
        $role = $user->getUserRole($noinduk);

        $payload = [
            "no_induk"=>$noinduk,
            "role"=>$role,
            "iat"=>$now
        ];

        $jwte = JWT::encode($payload,$secretKey,"HS256");
        
        $resp["no_induk"] = $noinduk;
        $resp["accessToken"] = $jwte;
        $resp["isLoggedIn"] = true;

        return $resp;
    }
   
}