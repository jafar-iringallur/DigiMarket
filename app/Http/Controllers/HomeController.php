<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
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
        $entity_type = [
            "soleProprietor" => "Sole Proprietor",
            "singleMemberLLC" => "Single Member LLC",
            "limitedLiabilityCompany" => "Limited Liability Company",
            "generalPartnership" => "General Partnership",
            "unlistedCorporation" => "Unlisted Corporation",
            "publiclyTradedCorporation" => "Publicly Traded Corporation",
            "association" => "Association",
            "nonProfit" => "Non Profit",
            "governmentOrganization" => "Government Organization",
            "revocableTrust" => "Revocable Trust",
            "irrevocableTrust" => "Irrevocable Trust",
            "estate" => "Estate"
        ];
        $industries = [
            "retail" => "Retail",
            "wholesale" => "Wholesale",
            "restaurants" => "Restaurants",
            "hospitals" => "Hospitals",
            "construction" => "Construction",
            "insurance" => "Insurance",
            "unions" => "Unions",
            "realEstate" => "Real Estate",
            "freelanceProfessional" => "Freelance Professional",
            "otherProfessionalServices" => "Other Professional Services",
            "onlineRetailer" => "Online Retailer",
            "otherEducationServices" => "Other Education Services",
        ];
        $states = State::all();
        $cities = City::where('state_id',10)->get();
        $public_url = $this->getPublicUrl();
        return view('getting_started',["status" => $status,"entity_types" => $entity_type,"industries" => $industries,"states" => $states,"cities" => $cities,"public_url" => $public_url]);

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
         elseif($businsee_profile->public_url == null){
            $status = 3;
         }
         else{
            $status = 10;
         }
         return  $status;

    }

    public function getCity(Request $request){
        $cities = City::where('state_id',$request->state)->get();
        return response()->json([
            'success' => true,
            'data' => $cities,
        ]);
    }

    public function getPublicUrl(){
        $user = Auth::user();
        $businsee_profile = UserBusinessProfile::where('user_id',$user->id)->first();
        if(isset($businsee_profile->id)){
            $check = $this->checkPublicUrlAvailablity($businsee_profile->business_name);
            $response = $check->getData();
            if($response->success){
                return $response->public_url;
            }
            else{
               return $this->generatePublicUrl($businsee_profile->business_name);
            }
        }
        else{
            return '';
        }
    }

    public function checkPublicUrlAvailablity($keyword){
        $string = preg_replace('/[^\da-z ]/i', '', $keyword);
        $public_url = str_replace(' ', '-', strtolower($string));
        $url = UserBusinessProfile::where('public_url',$public_url)->first();
        if(isset($url->id)){
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => true , 'public_url' =>  $public_url]);
    }

    public Function generatePublicUrl($keyword){
        $digit = rand ( 100 , 999 );
        $check = $this->checkPublicUrlAvailablity($keyword.$digit);
        if($check['success']){
            return $check['public_url'];
        }
        else{
            $digit = rand ( 1000 , 9999 );
            $check = $this->checkPublicUrlAvailablity($keyword.$digit);
            if($check['success']){
                return $check['public_url'];
            }
        }
    }
}
