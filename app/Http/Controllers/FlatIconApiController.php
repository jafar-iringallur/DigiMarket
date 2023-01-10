<?php

namespace App\Http\Controllers;

use App\Models\ApiCredential;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlatIconApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIcons($key){
        $api_credential = ApiCredential::where('api_name','flaticon')->first();
        $now =  Carbon::now();
        if($api_credential->token_expire > $now){
          return $this->searchIcons($key);
        }
        else{ // expired
           $access_token = $this->authentication($api_credential);
           if($access_token['success']){
            return $this->searchIcons($key);
           }
           else{
            return (['success' => false,'message' => "Something went wrong"]);
           }
        }
    }

    private function authentication($api_credential){
        $apiURL = 'https://api.flaticon.com/v3/app/authentication';
        $postInput = [
            'apikey' => $api_credential->api_key
        ];
  
        $response = Http::post($apiURL, $postInput);
        $responseBody = json_decode($response->getBody(), true);
        if(isset($responseBody['data'])){
            $api_credential->access_token = $responseBody['data']['token'];
            $api_credential->token_expire = Carbon::now()->addDays(1);
            $api_credential->save();
            return (['success' => true]);
        }
        else{
            return (['success' => false,'message' => "Something went wrong"]);
        }

    }

    private function searchIcons($key){
        $api_credential = ApiCredential::where('api_name','flaticon')->first();
        $apiURL = "https://api.flaticon.com/v3/search/icons/priority?q=$key&limit=15";
        $response  = Http::withHeaders([
            'Authorization' => 'Bearer ' . $api_credential->access_token
        ])->get($apiURL);
        $responseBody = json_decode($response->getBody(), true);
        if(isset($responseBody['data'])){
            $icons_url = [];
            $counter =0;
            foreach($responseBody['data'] as $icon){
                if($counter<10){
                    $icons_url[] = $icon['images'][64];
                }
                else{
                    break;
                }
                $counter++;
            }
            return (['success' => true,'data' => $icons_url]);
        }
        elseif(isset($responseBody['fault'])){
            $access_token = $this->authentication($api_credential);
            if($access_token['success']){
             return $this->searchIcons($key);
            }
            else{
             return (['success' => false,'message' => "Something went wrong"]);
            }
        }
        else{
            return (['success' => false,'message' => "Something went wrong"]);
        }
    
    }
}
