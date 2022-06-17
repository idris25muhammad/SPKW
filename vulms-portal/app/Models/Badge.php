<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\vulnapp;
use App\Models\User;

class Badge extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function vulnapp()
    {
        return $this->belongsTo(Vulnapp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
