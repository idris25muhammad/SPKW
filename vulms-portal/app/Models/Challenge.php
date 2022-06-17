<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vulnapp()
    {
        return $this->belongsTo(Vulnapp::class);
    }

}
