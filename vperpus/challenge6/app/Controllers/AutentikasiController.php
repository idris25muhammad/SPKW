<?php

namespace  App\Controllers;

use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Validator as v;
use App\Models\UserModel;
use App\Controllers\UserController;


class AutentikasiController
{

    protected $user;
    protected $customResponse;
    protected $validator;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UserController = new UserController();
        $this->customResponse = new CustomResponseHandler();
        $this->validator = new Validator();
    }

    public function loginUser(Request $request,Response $response)
    {
        $this->validator->validate($request,[
            "username"=>v::notEmpty(),
            "password"=>v::notEmpty()
        ]);

        if($this->validator->failed())
        {
            $responseMessage = $this->validator->errors;
            return $this->customResponse->is400Response($response,$responseMessage);
        }
        
        $noIndukReq = CustomRequestHandler::getParam($request,'username');
        $passwordReq = CustomRequestHandler::getParam($request,'password');

        $verifikasi = $this->verifikasiUser( $noIndukReq, $passwordReq);

        if($verifikasi==false)
        {
            $responseMessage = "Username atau password salah!";
            return $this->customResponse->is400Response($response,$responseMessage);
        }
        else {
            $responseMessage = JWTController::generateToken(
                CustomRequestHandler::getParam($request,"username")
            );

            if ($noIndukReq=="777777") {
                $flag = "03fcfc46ffc24c90ffa41b83453822a7";
                return $this->customResponse->is200Response($response,$responseMessage,$flag);
            }

            return $this->customResponse->is200Response($response,$responseMessage);
        }
        
    }

   
    public function verifikasiUser($no_induk,$password)
    {
        $count = $this->UserModel->where(["no_induk"=>$no_induk])->count();
        
        if($count==0)
        {
            return false;
        }

        //hash password dengan md5
        $hashedPasswordReq =  $this->hashPassword($password);
        //get data passsword user dari database
        $userdata = $this->UserModel->where(["no_induk"=>$no_induk])->first();   
        $passwordDB = $userdata->password;
        
        //verifikasi apakah password yang diinputkan sama dengan yang ada pada database
        if($passwordDB!=$hashedPasswordReq)
        {
            return false;
        } 
        
        return true;    
    }

   


    // public function verifikasiResetPWD($no_induk,$answer)
    // {
    //     $count = $this->UserModel->where(["no_induk"=>$no_induk])->count();
        
    //     if($count==0)
    //     {
    //         return false;
    //     }

    
    //     //get data answer user dari database
    //     $userData = $this->UserModel->where(["no_induk"=>$no_induk])->first();   
    //     $answerDB = $userData->resetAnswer;
        
    //     //verifikasi apakah password yang diinputkan sama dengan yang ada pada database
    //     if($answer!=$answerDB)
    //     {
    //         return false;
    //     } 
        
    //     return true;    
    // }
  
    public function hashPassword($password)
    {
        return md5($password);
    }

   

}