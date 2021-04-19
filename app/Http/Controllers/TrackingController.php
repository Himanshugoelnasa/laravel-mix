<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrackingController extends Controller
{
   

    public function index(Request $request)
    {
        try{

            $data = Tracking::select(DB::raw("updated_by, count('name') as profile, avg(TIME_TO_SEC(TIMEDIFF(end_time, start_time))) as time"))
            ->groupBy('updated_by')->get();
            return view('tracking')->with(array('data'=>$data));

        } catch(Exception $ex) {
            return redirect('/');
        }
    }

    public function popup(Request $request)
    {
        try{

            $admin = $request->input('admin');
            
            $data = Tracking::where('updated_by', 'like', $admin)->get();
            return view('popup')->with(array('data'=>$data, 'admin'=>$admin));

        } catch(Exception $ex) {
            return redirect('/');
        }
    }

    

    



    
}
