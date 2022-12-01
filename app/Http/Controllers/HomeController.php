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
        return view('getting_started',["status" => $status,"entity_types" => $entity_type,"industries" => $industries,"states" => $states,"cities" => $cities]);

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

    public function getCity(Request $request){
        $cities = City::where('state_id',$request->state)->get();
        return response()->json([
            'success' => true,
            'data' => $cities,
        ]);
    }
}
