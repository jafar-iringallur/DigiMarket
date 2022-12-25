<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        // $products = Product::where('user_id',$user_id)->get();
    
        return view('dashboard.products.index',["products" => 'h']);
    }

    public function addIndex(){
        return view('dashboard.products.add');
    }

    public function uploadImage(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $user = Auth::user();
        $data = $request->image;
        // $image_array_1 = explode(";", $data);
        // $image_array_2 = explode(",", $image_array_1[1]);
        // $data = base64_decode($image_array_2[1]);

        // $image_name = 'upload/' . time() . '.png';

        // file_put_contents($image_name, $data);
        $file_name       = "product-image/".$user->id.'_'.time(). '_.'.'png';
        $apiURL = 'https://files.botire.in/api/upload-file';
        $postInput = [
            'auth_key' => 'LO3ZG7UoZ3rPJJ40qNEtY90XaZfHJ',
            'bucket' => 'test',
            'file' =>  $request->image,
            'file_name' => $file_name
        ];
  
        $response = Http::post($apiURL, $postInput);
        $responseBody = json_decode($response->getBody(), true);
        if($responseBody['success']){
            return response()->json([
                'success' => true,
                'file_name' => $responseBody['file_url'],
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => "something went wrong",
            ]);
        }
        // Storage::disk('public')->put($file_name, $data);
      
    }
}
