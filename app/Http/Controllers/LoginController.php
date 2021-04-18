<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_cart;
use App\Models\Category;
use App\Models\Product;
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

    

    public function getCategories(Request $request)
    {
        try{
            $data = Category::orderby('id', 'asc')->get();
            if($data) {
                return response(['error' => false, 'data' => $data]);
            } else {
                return response(['error' => true, 'message' => 'Something went wrong']);
            }
        }
        catch(Exception $ex)  {          
            return response(['error' => true, 'status' => 'Something went wrong']);
        }
        

    }


    public function getProducts(Request $request)
    {
        try{
            $data = Product::orderby('id', 'asc')->get();

            if($data) {
                return response(['error' => false, 'data' => $data]);
            } else {
                return response(['error' => true, 'message' => 'Something went wrong']);
            }
        }
        catch(Exception $ex)  {          
            return response(['error' => true, 'status' => 'Something went wrong']);
        }
        

    }


    public function getProductByCategory(Request $request)
    {
        try{
            $id = $request->input('category_id');

            $data = Product::where('category', '=', $id)->with('category_details')->orderby('id', 'asc')->get();
            if($data) {
                return response(['error' => false, 'data' => $data]);
            } else {
                return response(['error' => true, 'message' => 'Something went wrong']);
            }
            
        }
        catch(Exception $ex)  {          
            return response(['error' => true, 'status' => 'Something went wrong']);
        }
        

    }


    public function addProductToCart(Request $request)
    {
        try{

            //user authorization
            $user = Auth::user();

            //parameters required to add product to cart
            $id = $request->input('product_id');
            $quantity = $request->input('quantity');

            //getting product details
            $product_details = Product::where('id', '=', $id)->first();

            // check if product is added
            $checkIfExixt = User_cart::where('user_id', '=', $user->id)->where('product_id', '=', $id)->where('quantity', '=', $quantity)->count();

            if($checkIfExixt > 0) {
                return response(['error' => true, 'message' => 'Product is already added']);
            }

            // product add into cart
            $data = User_cart::insert([
                    [
                        'user_id' => $user->id,
                        'product_id' => $id,
                        'price' => $product_details->price,
                        'quantity' => $quantity,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                ]);


            if($data) {
                return response(['error' => false, 'message' => 'Product is successfully added into cart']);
            } else {
                return response(['error' => true, 'message' => 'Something went wrong']);
            }
            
        }
        catch(Exception $ex)  {          
            return response(['error' => true, 'status' => 'unauthenticated']);
        }
        

    }


    public function userCart(Request $request)
    {
        try{

            //user authorization
            $user = Auth::user();


            $data = User_cart::with('user_details')->with('product_details')->orderby('id', 'asc')->get();
            if($data) {
                return response(['error' => false, 'data' => $data]);
            } else {
                return response(['error' => true, 'message' => 'Something went wrong']);
            }
            
        }
        catch(Exception $ex)  {          
            return response(['error' => true, 'status' => 'Something went wrong']);
        }
        

    }



    
}
