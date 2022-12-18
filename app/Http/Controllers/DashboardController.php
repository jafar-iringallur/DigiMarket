<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserBusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $businsee_profile = UserBusinessProfile::where('user_id',$user_id)->first();
    
        return view('dashboard.index',["businsee_profile" => $businsee_profile]);
    }
}
