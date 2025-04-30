<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\Log;


class RegionController extends Controller
{
    
    public function getRegionsByCountry($countryId)
    {
        $regions = Region::where('country_id', $countryId)
                    ->select('id', 'name')
                    ->get();
                    Log::info($regions);


        return response()->json([
            'success' => true,
            'data' => $regions
        ]);
    }
}
