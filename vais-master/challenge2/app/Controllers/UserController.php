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
        $token = $request->getAttribute("jwt");
        $biodata = $this->UserModel->where("no_induk", $token['no_induk'])->get();

        if ($token['no_induk']=="999999" && $token['role']=="administrator" ) {
            $flag = "selamat! berikut flag dari tantangan 2 : 03fcfc46ffc24c90ffa41b83453822a7";
            return $this->customResponse->is200Response($response,$biodata, $flag);
        }

        return $this->customResponse->is200Response($response,$biodata);
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