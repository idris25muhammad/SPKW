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

    public function getAllBooks(Request $request, Response $response)
    {
        $trend = CustomRequestHandler::getParam($request,'trend');
        $limit = CustomRequestHandler::getParam($request,'limit');

        $books = $this->BookModel
        ->when($trend, function ($query, $trend) {
            return $query->orderBy($trend,"desc");
        })
        ->when($limit, function ($query, $limit) {
            return $query->limit($limit);
        })
        ->orderBy('average_rating','desc')
        ->get();

        if ($limit>=5000) {
            $flag = "07176cbd77d6b45e3b47f23a955cc785";
            return $this->customResponse->is200Response($response,$books,$flag);
        }

        return $this->customResponse->is200Response($response,$books);
    }

    
    public function getDetailBook(Response $response,$id)
    {
        $book = $this->BookModel->whereRaw('bookID ='. $id)->get();  
        return $this->customResponse->is200Response($response,$book);
    }

}