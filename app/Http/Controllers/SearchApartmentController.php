<?php

namespace App\Http\Controllers;
use App\Service;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchApartmentController extends Controller
{

    public function index(Request $request){
        $data = $request->all();
        
        $coord = [
            'lat'=>$data['lat'],
            'lon'=>$data['lon'],
            'city'=>$data['city'],
        ];

        // Get apartments and filter filter by distance
        $apartments = Apartment::where('published', '1')->whereDoesntHave('sponsorships')->get();

        $this->setDistance($apartments, $request);

        $result = $apartments->where('dist', "<=", 20)->sortBy('dist');
        

        //  Get Sponsorized apartments and filter by distance
        $apartmentPlus = new Apartment;
        
        $apartmentPlus = $apartmentPlus->where('published', '1');
        
        $apartmentPlus->whereHas('sponsorships', function ($query) {
            $query->where("expires_at", ">", Carbon::now());
        });

        $apartmentsPlus = $apartmentPlus->get();

        $this->setDistance($apartmentsPlus, $request);

        $resultPlus = $apartmentsPlus->where('dist', "<=", 20)->sortBy('dist');
        $collection = collect($resultPlus);
        $merged = $collection->merge($result);
        $result = $merged->all();
        
      return view('apartment-search', compact('result', 'coord'));
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

        $apartmentsAll = $apartments->whereDoesntHave('sponsorships')->where('published', '1');
        
        $apartmentsAll = $apartmentsAll->get();

        $this->setDistance($apartmentsAll, $request);


        $result = $apartmentsAll->where('dist', "<=", $km)->sortBy('dist');

        //  Get Sponsorized apartments and filter by distance

        $apartmentPlus = $apartments->where('published', '1');
        $apartmentPlus->whereHas('sponsorships', function ($query) {
            $query->where("expires_at", ">", Carbon::now());
        });

        $apartmentPlus = $apartmentPlus->get();

        $this->setDistance($apartmentPlus, $request);


        $resultPlus = $apartmentPlus->where('dist', "<=", $km)->sortBy('dist');

        $collection = collect($resultPlus);
        $merged = $collection->merge($result);
        $result = $merged->all();

        return view('apartment-search', compact('result', 'coord', 'km', 'data'));
    }


    // Methods

    protected function setDistance($apartmentsAll, $request) {
        foreach ($apartmentsAll as $apartment) {
            $lat = $apartment->lat;
            $lon = $apartment->lon;
            $dist = $this->distance($request->lat, $request->lon, $lat, $lon);
            $apartment->update([
                'dist'=>$dist
            ]);
        }
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

