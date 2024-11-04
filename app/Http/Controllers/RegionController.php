<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getCities($provinceCode)
    {
        $cities = Region::getCities($provinceCode);
        return response()->json($cities);
    }

    public function getDistricts($cityCode)
    {
        $districts = Region::getDistricts($cityCode);
        return response()->json($districts);
    }

    public function getVillages($districtCode)
    {
        $villages = Region::getVillages($districtCode);
        return response()->json($villages);
    }
}
