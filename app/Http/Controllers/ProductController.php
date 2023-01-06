<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UserBusinessProfile;
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
    public function uploadCategoryImage(Request $request){
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
        $file_name       = "category-image/".$user->id.'_'.time(). '_.'.'png';
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

    public function getCategories(){
        $user_id = Auth::user()->id;
        $businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
        $categories = Category::select('name','id')->where('user_id',$user_id)->where('business_id',$businsee_profile->id)->get()->toArray();
        return response()->json([
            'success' => true,
            'categories' => $categories,
        ]);
    }

    public function addCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $user_id = Auth::user()->id;
        $businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
        $duplicate = Category::where('user_id',$user_id)->where('name',$request->name)->first();
        if(isset($duplicate->id)){
            return response()->json([
                'success' => false,
                'message' => "category already exist",
            ]);
        }
        $new = new Category();
        $new->user_id = $user_id;
        $new->business_id = $businsee_profile->id;
        $new->name = $request->name;
        $new->image = $request->image;
        $new->save();
        return response()->json([
            'success' => true,
            'message' => "category added",
        ]);
    }
}
