<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\UserBusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $string = preg_replace('/[^\da-z ]/i', '-', $keyword);
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
        $response = $check->getData();
        if($response->success){
            return $response->public_url;
        }
        else{
            $digit = rand ( 1000 , 9999 );
            $check = $this->checkPublicUrlAvailablity($keyword.$digit);
            $response = $check->getData();
            if($response->success){
                return $response->public_url;
            }
        }
    }

    public function uploadLogo(Request $request){
        $validator = Validator::make($request->all(), [
            'business_logo' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $user = Auth::user();
        $data = $request->business_logo;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        // $image_name = 'upload/' . time() . '.png';

        // file_put_contents($image_name, $data);
        $file_name       = "business-logo/".$user->id.'_'.time(). '_.'.'png';
        Storage::disk('public')->put($file_name, $data);
        return response()->json([
            'success' => true,
            'file_name' => $file_name,
        ]);
    }

    public function saveBusiness(Request $request){
        $validator = Validator::make($request->all(), [
            'business_name' => 'required|min:4',
            'business_address_line_1' => 'required',
            'business_place' => 'required',
            'business_city' => 'required',
            'business_district' => 'required',
            'business_state' => 'required',
            'business_zip' => 'required|min:5',
            'business_phone' => 'required|digits:10|integer',
            'business_email' => 'required|email',
            'business_whatsapp' => 'required|digits:10|integer',
            'business_logo_file' => 'required',
            'entity_type' => 'required',
            'industry_type' => 'required'
        ]);
        $user = Auth::user();
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
       
        $businsee_profile = UserBusinessProfile::where('user_id',$user->id)->first();
        if(!isset($businsee_profile->id)){
            $businsee_profile = new UserBusinessProfile();
            $businsee_profile->user_id = $user->id;
        }
        $businsee_profile->business_name = $request->business_name;
        $businsee_profile->business_address_line_1 = $request->business_address_line_1;
        $businsee_profile->business_place = $request->business_place;
        $businsee_profile->business_city = $request->business_city;
        $businsee_profile->business_district = $request->business_district;
        $businsee_profile->business_state = $request->business_state;
        $businsee_profile->business_zip = $request->business_zip;
        $businsee_profile->business_phone = $request->business_phone;
        $businsee_profile->business_email = $request->business_email;
        $businsee_profile->business_whatsapp = $request->business_whatsapp;
        $businsee_profile->business_logo =  $request->business_logo_file;
        $businsee_profile->entity_type = $request->entity_type;
        $businsee_profile->industry_type = $request->industry_type;
        $businsee_profile->save();
        return redirect('/home');
    }

    public function checkUrl(Request $request){
        return $this->checkPublicUrlAvailablity($request->keyword);
    }

    public function saveUrl(Request $request){
        $validator = Validator::make($request->all(), [
            'public_url' => 'required|unique:user_business_profiles|max:50'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $user = Auth::user();
        $businsee_profile = UserBusinessProfile::where('user_id',$user->id)->first();
        $businsee_profile->public_url = $request->public_url;
        $businsee_profile->save();
        return redirect('/home');
    }
}
