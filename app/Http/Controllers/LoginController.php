<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        $user = Auth::user();

        $accessToken = \Auth::user()->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);

    }

    public function users(Request $request)
    {
        try{
            $check = auth()->check();
            if($check == 1) {
                return $user = Auth::user();
            } else {
                return response(['user' => 'unauthenticated']);
            }
        }
        catch(Exception $ex) {
            return response(['user' => 'unauthenticated']);
        }
        
       return abort(401, 'You are not authenticated to this service');

    }


    public function getCategories(Request $request)
    {
        try{
            $check = auth()->check();
            if($check == 1) {
                return $user = Auth::user();
            } else {
                return response(['user' => 'unauthenticated']);
            }
        }
        catch(Exception $ex) {
            return response(['user' => 'unauthenticated']);
        }
        
       return abort(401, 'You are not authenticated to this service');

    }



    
}
