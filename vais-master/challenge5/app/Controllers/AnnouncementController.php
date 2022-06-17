<?php

namespace  App\Controllers;

use App\Models\AnnouncementModel;
use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Validator as v;

class AnnouncementController
{
    protected $customResponse;
    protected $guestEntry;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->AnnouncementModel = new AnnouncementModel();
        $this->validator = new Validator();
    }

    public function viewAllAnnouncements(Response $response)
    {
        $dataAnnouncement = $this->AnnouncementModel->limit(10)->orderBy("posted_at", "desc")->get();
        return $this->customResponse->is200Response($response,$dataAnnouncement);
    }

    public function viewDetailAnnouncement(Response $response, $id)
    {
        $dataAnnouncement = $this->AnnouncementModel
            ->select('*')->where("id", $id)->first();
       
        return $this->customResponse->is200Response($response,$dataAnnouncement);
    }

    public function viewLatestAnnouncement(Response $response)
    {
        $dataAnnouncement = $this->AnnouncementModel->limit(1)->orderBy("posted_at", "desc")->get();
        return $this->customResponse->is200Response($response,$dataAnnouncement);
    }

    public function deleteAnnouncement(Response $response)
    {

        //fungsi admin untuk delete semua berita
        // $this->AnnouncementModel->truncate(); //sengaja di nonaktifkan
        $responseMessage = "Selamat anda berhasil menyelesaikan tantangan 5! dalam kasus aplikasi di dunia nyata, pemanggilan API ini akan memanggil fungsi delete all atau truncate yang akan menghapus semua data announcement. Namun dalam percobaan ini tidak dilakukan agar dapat menjadi media informasi bagi user lainnya! ";
    
        $flag = "3b0ce457aa2483667c096c08c04006fe";
        return $this->customResponse->is200Response($response,$responseMessage,$flag);

    }

}