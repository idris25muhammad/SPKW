<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badge;

class BadgeController extends Controller
{
   
    public function index()
    {
        $badges = Badge::where('user_id',auth()->user()->id)
        ->get();

        return view('badges.index', compact('badges'));
    }
}
