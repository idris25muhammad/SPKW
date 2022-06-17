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


class MahasiswaController
{

    protected $customResponse;
    protected $MahasiswaModel;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->MahasiswaModel = new UserModel();
        $this->validator = new Validator();
    }

    public function viewSemuaMahasiswa(Response $response)
    {
            $allMahasiswa = $this->MahasiswaModel
            ->where("role","mahasiswa")->get();
        
            return $this->customResponse->is200Response($response,$allMahasiswa);
    }

    public function viewMahasiswa(Response $response, $id)
    {
            $detail = $this->MahasiswaModel
            ->where("no_induk",$id)
            ->where("role", "mahasiswa")
            ->get();
        
            return $this->customResponse->is200Response($response,$detail);
    }

   
}