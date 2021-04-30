<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\City;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function getCountry()
    {

        $country = Country::all();
        return response()->json($country);
        
    }
    public function getState(Request $request)
    {

        $state = State::where('country_id',$request->country_id)->get();
        return response()->json($state);
        
    }
    public function getCity(Request $request)
    {

        $city = City::where('state_id',$request->state_id)->get();
        return response()->json($city);
        
    }
}
