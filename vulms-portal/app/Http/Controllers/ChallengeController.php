<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\Challenge;
use App\Models\Pentest;

class ChallengeController extends Controller
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
    public function index($id)
    {
        $list_challenges = Challenge::where('vulnapp_id',$id)->get(); 
        $user_challenges = Pentest::whereHas('challenge', function ($q) use($id) {
            $q->where('vulnapp_id', $id);
        })->where('user_id',auth()->user()->id)->get(); 
        
        if($list_challenges->count() != $user_challenges->count()) {
            foreach($list_challenges as $item) {
                if($item->risk_rating == 5) {
                    $point=100;
                }
                else if($item->risk_rating == 4) {
                    $point=75;
                }
                else if($item->risk_rating == 3) {
                    $point=50;
                }
                else if($item->risk_rating == 2) {
                    $point=25;
                }
                else {
                    $point=0;
                }
                
                //insert new challenge pentest for specific user
                // $pentest = new Pentest;
                // $pentest->challenge_id = $item->id;
                // $pentest->user_id = auth()->user()->id;
                // $pentest->point = $point;
                // $pentest->save();

                $pentest = Pentest::firstOrCreate(
                    ['user_id' => auth()->user()->id, 'challenge_id' => $item->id],
                    ['point' => $point]
                );
              
            }
        }
        
        $data = Pentest::whereHas('challenge', function ($q) use($id)  {
            $q->where('vulnapp_id', $id);
        })->where('user_id',auth()->user()->id)->get(); 
        
        if($data!=null) {
            $totalscore = Pentest::whereHas('challenge', function ($q) use($id)  {
                $q->where('vulnapp_id', $id);
            })->where('user_id', auth()->user()->id)
            ->where('status',  1)->sum('point');
        }
        else {
            $totalscore = 0;
        }

        return view('challenges.index')
        ->with('challenges',$data)
        ->with('totalscore',$totalscore);
    }

    public function submitFlag($id)
    {
        $pentest  = Pentest::where('challenge_id',$id)
        ->where('user_id', auth()->user()->id)
        ->get();
        
        return view('challenges.flag')
        ->with('status', $pentest[0]->status)
        ->with('idchal', $id);
    }

    public function verifikasiFlag(Request $request)
    {
        $idchal = $request->challengeId;
        $iduser = $request->userId;
        $flag = $request->flag;

        $flagcount = Challenge::where("flag_code",$flag)->count();

        
        if($flagcount>0) {     
            // ganti status dari 0 menjadi 1 db
            Pentest::where('challenge_id',$idchal)
            ->where('user_id',$iduser)
            ->update([
                'status' => 1
            ]);
            $status=1;
            return redirect()->route("challenge.flag", [$idchal]);
        }
        else {
            $status=3;
            return redirect()->route("challenge.flag", [$idchal]);
        }

        
    }
    
}
