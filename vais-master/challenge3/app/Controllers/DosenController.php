<?php

namespace  App\Controllers;

use App\Models\UserModel;
use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;


class DosenController
{

    protected $customResponse;
    protected $DosenModel;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->DosenModel = new UserModel();
        $this->validator = new Validator();
    }

    public function viewSemuaDosen(Response $response)
    {
            $allDosen = $this->DosenModel->select('no_induk','nama_lengkap','program_studi')
            ->where("role","dosen")->get();
        
            return $this->customResponse->is200Response($response,$allDosen);
    }

    public function viewDosen(Response $response, $id)
    {
            $detail = $this->DosenModel
            ->where("no_induk",$id)->select('no_induk','nama_lengkap','program_studi')
            ->where("role", "dosen")
            ->get();
        
            return $this->customResponse->is200Response($response,$detail);
    }

   
}