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

    public function viewAllLecturer(Request $request, Response $response)
    {
        $lecturers = $this->UserModel->where("role", "dosen")->get();
        $flag = "e37ea288e5f33ab601b35970019b5666";
        return $this->customResponse->is200Response($response,$lecturers,$flag);
    }

   
    
}