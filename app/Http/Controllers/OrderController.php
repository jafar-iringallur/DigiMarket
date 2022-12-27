<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        // $products = Product::where('user_id',$user_id)->get();
    
        return view('dashboard.orders.index',["orders" => 'h']);
    }

    public function singleOrder($id)
    {
        $user_id = Auth::user()->id;
        // $products = Product::where('user_id',$user_id)->get();
    
        return view('dashboard.orders.single-index',["orders" => 'h']);
    }

}
