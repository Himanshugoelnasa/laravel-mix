<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test_api(Request $request)
    {
        $ip = request()->ip();
        if($request->name) {
            $message = "Greetings ".$request->name;
            return response()->json(['ip' => $ip, "message" => $message]);
        } else {
            return response()->json(['ip' => $ip]);
        }
        
    }

}

