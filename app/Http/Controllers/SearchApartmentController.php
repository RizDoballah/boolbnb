<?php

namespace App\Http\Controllers;
use App\Apartment;
use Illuminate\Http\Request;

class SearchApartmentController extends Controller
{


    public function index(Request $request){
      $data = $request->all();
      // dd($data);
      $coord = [
      'lat'=>$data['lat'],
      'lon'=>$data['lon']
      ];
      $apartments = Apartment::all();
      $result = [];
      foreach ($apartments as $apartment) {
         $lat = $apartment->lat;
         $lon = $apartment->lon;
         $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
         if($dist <= 20){
           $result[]=$apartment;
         }
      }
      return view('apartment-search', compact('result', 'coord'));
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



      public function filter(Request $request)
      {



        $data = $request->all();
        $coord = [
          'lat'=>$data['lat'],
          'lon'=>$data['lon']
        ];
        $km = [
          'km'=>$data['km']
        ];


        // $apartments = Apartment::all();
         $apartments = Apartment::where('beds', $data['letti'])
         ->where('rooms', $data['camere'])->get();
          // ['rooms', $data['camere']]
          // dd($apartments);

        $result = [];
        foreach ($apartments as $apartment) {
           $lat = $apartment->lat;
           $lon = $apartment->lon;
           $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
           if($dist <= $data['km']){
             $result[]=$apartment;
           }
        }
        // dd($result);


        // "wifi" => "on"
        // "piscina" => "on"
        // "posto-macchina" => "on"
        // "sauna" => "on"
        // "vista-mare" => "on"
        // "portineria" => "on"


          return view('apartment-search', compact('result', 'coord', 'km'));      }





    }
