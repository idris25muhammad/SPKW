<?php
namespace  App\Models;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
 protected $table = "rencana_studi";
 protected $guarded = ["id_kelas","id_mahasiswa"];
}