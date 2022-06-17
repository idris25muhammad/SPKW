<?php

namespace  App\Controllers;

use App\Models\UserModel;
use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Validator as v;

class UserController
{
    protected $customResponse;
    protected $UserModel;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->validator = new Validator();
        $this->UserModel = new UserModel();
    }

   

    //mass assignment
    public function registrasiUser(Request $request,Response $response)
    {
        $this->validator->validate($request,[
            "no_induk"=>v::notEmpty(),
            "nama_lengkap"=>v::notEmpty(),
            "email"=>v::notEmpty(),
            "password"=>v::notEmpty(),
            "program_studi"=>v::notEmpty()
        ]);

        if($this->validator->failed())
        {
            $responseMessage = $this->validator->errors;
            return $this->customResponse->is400Response($response,$responseMessage);
        }

        $reqdata = json_decode($request->getBody(),true); 
        $reqdata["password"] =  $this->hashPassword($reqdata["password"]);
        $role = CustomRequestHandler::getParam($request,'role');
        if(isset($role) && $role=="administrator") {
            $responseMessage = "Anda berhasil daftar sebagai administrator. Silahkan login dengan email dan password";
            $flag="401ad0dba47bf4c07a569579be21ea2f";
            $this->UserModel->create($reqdata);

            return $this->customResponse->is200Response($response,$responseMessage,$flag);
        }
        else{
            $this->UserModel->create($reqdata);
            $responseMessage = "Anda berhasil daftar sebagai member. Silahkan login dengan email dan password";   
            return $this->customResponse->is200Response($response,$responseMessage);
        }

        return $this->customResponse->is200Response($response,$responseMessage);
    }


    public function getUserRole($id)
    {
        $user = $this->UserModel->where(["no_induk"=>$id])->first();
        return $user->role;
    }

    public function getUserInfo($id)
    {
        $user = $this->UserModel->where(["no_induk"=>$id])->first();
        return $user;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
    
}