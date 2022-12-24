<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $products = Product::where('user_id',$user_id)->get();
    
        return view('dashboard.products.index',["products" => $products]);
    }
}
