<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->orderBy('name')->get();
        return response()->json($districts);
    }

    public function getWards($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->orderBy('name')->get();
        return response()->json($wards);
    }
}
