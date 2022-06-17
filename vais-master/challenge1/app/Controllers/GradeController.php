<?php

namespace  App\Controllers;

use App\Models\GradeModel;
use App\Requests\CustomRequestHandler;
use App\Responses\CustomResponseHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use App\Validations\Validator;
use Respect\Validation\Validator as v;

class GradeController
{

    protected $customResponse;
    protected $guestEntry;
    protected $validator;

    public function __construct()
    {
        $this->customResponse = new CustomResponseHandler();
        $this->GradeModel = new GradeModel();
        $this->validator = new Validator();
    }

    public function viewStudentGrade(Response $response, $id_mahasiswa)
    {

        $dataGrade = $this->GradeModel
            ->select('matakuliah.kode_makul', 'matakuliah.nama', 'rencana_studi.nilai_akhir')
            ->Join('kelas', 'id_kelas', '=', 'kelas.id')
            ->Join('matakuliah', 'kelas.kode_makul', '=', 'matakuliah.kode_makul')
            ->where("id_mahasiswa", $id_mahasiswa)
            ->get();
        
        if ($dataGrade->isEmpty()) { 
            return $this->customResponse->is204Response($response,$dataGrade);
        }

        if ($id_mahasiswa=="252525") {
            $flag = "bc50d2a3d99cf9c90c19c574ef5df769";
            return $this->customResponse->is200Response($response,$dataGrade,$flag);
        }


        return $this->customResponse->is200Response($response,$dataGrade);
    }

    // public function deleteStudentGrade(Response $response,$id_mahasiswa)
    // {
    //     $this->GradeModel->where(["id_mahasiswa"=>$id_mahasiswa])->delete();
    //     $responseMessage = "Nilai berhasil dihapus";
    //     return $this->customResponse->is200Response($response,$responseMessage);
    // }

}