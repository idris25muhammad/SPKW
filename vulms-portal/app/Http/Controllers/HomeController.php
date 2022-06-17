<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pentest;
use App\Models\Vulnapp;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $challenges = array();
        // $challenges['total'] = Pentest::where('user_id',auth()->user()->id)
        //                         ->count(); 

        // $challenges['completed'] = Pentest::where('user_id',auth()->user()->id)->where('status',1)
        //                             ->count(); 


        $vulnapps = Vulnapp::where('status',1)->get();


        foreach ($vulnapps as $item) {
            
            $item->total = Pentest::where('user_id',auth()->user()->id)
                                    ->whereHas('challenge', function ($q) use ($item) {
                                        $q->where('vulnapp_id', $item->id);
                                    })
                                    ->count(); 

            $item->completed = Pentest::where('user_id',auth()->user()->id)
                                    ->whereHas('challenge', function ($q) use ($item) {
                                        $q->where('vulnapp_id', $item->id);
                                    })
                                    ->where('status',1)
                                    ->count(); 
        }

        return view('home')
        ->with('vulnapps',$vulnapps);
    }
}
