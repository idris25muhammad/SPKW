<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    // protected $fillable = ["nama","no_induk","password","role"];
    protected $guarded = [];
    protected $hidden = ['password'];
}