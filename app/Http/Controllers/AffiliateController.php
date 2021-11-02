<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class AffiliateController extends Controller
{
    // Earth's Radius in meters
    const EARTH_RADIUS = 6371000;
    const DUBLIN_LONG = -6.2535495;
    const DUBLIN_LAT = 53.3340285;

    private function getJsonAsArray(){
        $ndjson = Storage::disk('local')->get('affiliates.txt');
        
        // Split on newline into array
        $json = explode("\n", $ndjson);

        // Map array and decode each line
        return array_map(fn($line) => json_decode($line, true), $json);
    }

    // https://en.wikipedia.org/wiki/Great-circle_distance#Formulae
    private function calculateDistance($longitude, $latitude){

        // Convert to rads
        $dublinLong = deg2rad(AffiliateController::DUBLIN_LONG);
        $dublinLat = deg2rad(AffiliateController::DUBLIN_LAT);
        $affiliateLong = deg2rad((float)$longitude);
        $affiliateLat = deg2rad((float)$latitude);

        $diffLong = abs($affiliateLong - $dublinLong);
        $angle = 2 * acos(sin($affiliateLat)*sin($dublinLat) + cos($affiliateLat)*cos($dublinLat)*cos($diffLong));

        // Return distance in KM
        $distance = (AffiliateController::EARTH_RADIUS * $angle)/1000;
        return $distance;
    }

    private function getAffiliatesWithin100(){
        // Get all affiliates
        $affiliates = $this->getJsonAsArray();
        
        // Init empty return array w/ affiliates matching criteria 
        $affWithin100km = [];

        foreach($affiliates as $affiliate){
            $longitude = $affiliate['longitude'];
            $latitude = $affiliate['latitude'];

            if($this->calculateDistance($longitude, $latitude) <= 100){
                array_push($affWithin100km, (object)["id" => $affiliate['affiliate_id'], "name" => $affiliate['name']]);
            }
        }

        // Sort by aff_id, ascending
        usort($affWithin100km, function($a, $b) {
            return $a->id > $b->id ? 1 : -1;
        });

        return($affWithin100km);
    }

    public function showAffiliates(){
        $affiliates = $this->getAffiliatesWithin100();
        return view('affiliate-list')->with('affiliates', $affiliates);
    }
}
