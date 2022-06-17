<?php

namespace  App\Controllers;

use App\Models\BookModel;
use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;


class BookController
{

    protected $customResponse;
    protected $BookModel;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->BookModel = new BookModel();
        $this->validator = new Validator();
    }

 
    public function getDetailBook(Response $response,$id)
    {
        $book = $this->BookModel->whereRaw('bookID ='. $id)->get();  
        return $this->customResponse->is200Response($response,$book);
    }

}