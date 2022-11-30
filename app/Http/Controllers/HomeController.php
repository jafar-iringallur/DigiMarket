<?php

namespace App\Http\Controllers;

use App\Models\UserBusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function gettingStartIndex(){
        $status = $this->getOnboardStatus();
        if($status == 10){
            return redirect('/home');
        }
        return view('getting_started',["status" => $status]);

    }

    public function getOnboardStatus(){
        $user = Auth::user();
        $businsee_profile = UserBusinessProfile::where('user_id',$user->id)->first();
        if($user->email_verified_at == null){
           $status = 1;
         }
         elseif(!isset($businsee_profile->id)){
            $status = 2;
         }
         elseif($businsee_profile->status == 0){
            $status = 3;
         }
         else{
            $status = 10;
         }
         return  $status;

    }
}
