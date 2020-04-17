<?php

namespace App\Http\Controllers;
use App\Apartment;
use Illuminate\Http\Request;

class SearchApartmentController extends Controller
{
    public function index(Request $request){
      $data = $request->all();
      $apartments = Apartment::all();
      $result = [];
      foreach ($apartments as $apartment) {
         $lat = $apartment->lat;
         $lon = $apartment->lon;
         $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
         if($dist <= 2000){
           $result[]=$apartment;
         }

      }
      return view('apartment-search', compact('result'));
    }

    public function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
      {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
      }

    }
