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

    public function viewDetailUser(Request $request, Response $response)
    {
        $dataUser =  $this->UserModel->where(["email"=>$id])->first();
                
        return $this->customResponse->is200Response($response,$dataUser);
    }

    
    public function getUserRole($id)
    {
        $user = $this->UserModel->where(["email"=>$id])->first();
        return $user->role;
    }

    public function getUserInfo($id)
    {
        $user = $this->UserModel->where(["email"=>$id])->first();
        return $user;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
    
}