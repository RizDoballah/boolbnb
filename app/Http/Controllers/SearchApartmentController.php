<?php

namespace App\Http\Controllers;
use App\Apartment;
use App\Service;
use Illuminate\Http\Request;

class SearchApartmentController extends Controller
{


    public function index(Request $request){
      $data = $request->all();
      // dd($data);
      $coord = [
      'lat'=>$data['lat'],
      'lon'=>$data['lon'],
      'city'=>$data['city'],
      ];
      $apartments = Apartment::all();
      $result = [];
      foreach ($apartments as $apartment) {
         $lat = $apartment->lat;
         $lon = $apartment->lon;
         $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
         // Apartment::update([
         //   'dist'=>$dist
         // ]);
         // dd($apartment['dist']);
         if($dist <= 20){
           $result[]=$apartment;

         }


         // $query = "SELECT * FROM table WHERE lon BETWEEN '$minLon' AND '$maxLon' AND lat BETWEEN '$minLat' AND '$maxLat'";
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
          'lon'=>$data['lon'],
          'city'=>$data['city']
        ];
        $km = [
          'km'=>$data['km']
        ];

        $apartments = new Apartment;
        if (!empty($data['beds'])) {
            $apartments = $apartments->where('beds', $data['beds']);
        }
        if (!empty($data['rooms'])) {
            $apartments = $apartments->where('rooms', $data['rooms']);
        }
        if (!empty($data['services'])) {

            foreach ($data['services'] as $service) {
                $apartments = $apartments->whereHas('services', function($query) use($service) {
                    $query->where('name', $service);
                });
            }
        }

        $filteredApt = $apartments->get();

        $result = [];
        foreach ($filteredApt as $apartment) {
           $lat = $apartment->lat;
           $lon = $apartment->lon;
           $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
           if($dist <= $data['km']){
             $result[]=$apartment;
           }
        }
          return view('apartment-search', compact('result', 'coord', 'km', 'data'));
    }





    }
