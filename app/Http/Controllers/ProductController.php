<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UserBusinessProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
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
        $products = Product::select('products.*','categories.name as category_name')->where('products.user_id',$user_id)->leftJoin('categories','categories.id','products.category_id')->get();
        $data = [];
        foreach($products as $product){
            $images = json_decode($product->image);
            $data[] = [
                'name'=> $product->name,
                'image' => $images[0],
                'category' => $product->category_name,
                'price' => $product->selling_price,
                'stock' => $product->in_stock == "1" ? "Yes" : "No",
            ];
        }
        return view('dashboard.products.index',["products" =>  $data]);
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
      
    }

    public function findIcons(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $flatIcon_controller = new FlatIconApiController();
        $response = $flatIcon_controller->getIcons($request->name);
        return response()->json( $response);
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
            'icon' => 'required'
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
        $new->image = $request->icon;
        $new->save();
        return response()->json([
            'success' => true,
            'message' => "category added",
        ]);
    }

    public function saveProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'in_stock' => 'required|in:0,1',
            'category_id' => 'required',
            'base_qty' => 'required',
            'unit' => 'required',
            'original_price' => 'required',
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $user_id = Auth::user()->id;
        $businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = json_encode($request->images);
        $product->in_stock = $request->in_stock;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->base_qty = $request->base_qty;
        $product->unit = $request->unit;
        $product->size_variants =  json_encode($request->size_varient);
        $product->user_id = $user_id;
        $product->business_id = $businsee_profile->id;
        $product->save();
        return redirect('/products');
    }
}
