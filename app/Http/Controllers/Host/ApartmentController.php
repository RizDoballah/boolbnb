<?php

namespace App\Http\Controllers\Host;

use App\User;
use App\Apartment;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
     

    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();

        return view('host.index', compact('apartments'));
    }


    public function create()
    {
        $services = Service::all();

        return view('host.create', compact('services'));
    }


    public function store(Request $request)

    {


        $validatedData = $request->validate([
                'title'=> 'required',
                'description'=> 'required|string',
                'lat'=> 'nullable|numeric',
                'lon'=> 'nullable|numeric',
                'main_img'=>'required|image',
                'square_meters'=>'required|numeric',
                'rooms'=>'required|numeric',
                'bathroom'=>'required|numeric',
                'user_id'=>'exists:users,id'
            ]);
            

        $data = $request->all();


        $path = Storage::disk('public')->put('images', $request->main_img);

        $newApartment = Apartment::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'rooms' => $data['rooms'],
            'bathroom' => $data['bathroom'],
            'square_meters' => $data['square_meters'],
            'main_img' => $path
        ]);

        
        $services= $data['services'];

        if (!empty($services)) {
          $newApartment->services()->attach($services);
        }


        
        return redirect(route('host.show', $newApartment));
    }


    public function show($id)
    {
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        return view('host.show', compact('apartment'));
    }



    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $services = Service::all();

        if($apartment->user_id != Auth::user()->id){
            abort(404);
        }

        abort_if(empty($apartment), 404);

        return view('host.edit', [
            'services' => $services,
            'apartment' => $apartment
        ]);
    }



    public function update(Request $request, $id)
    {
        $apartment = Apartment::find($id);

        if($apartment->user_id != Auth::user()->id){
           abort(404);
        }

        $validatedData = $request->validate([
            'title'=> 'required',
            'description'=> 'required|string',
            'lat'=> 'nullable|numeric',
            'lon'=> 'nullable|numeric',
            'main_img'=>'image',
            'square_meters'=>'required|numeric',
            'rooms'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'user_id'=>'exists:users,id'
         ]);
         

    $data = $request->all();

    if(!empty($data['main_img'])) {
        $data['main_img'] = Storage::disk('public')->put('images', $data['main_img']);
       }
    
    $updated = $apartment->update($data);


    // if (!empty($request->tags)) {
    //     $tagsArray = $request->tags;
    //     foreach ($tagsArray as $key => $tag) {
    //         if(empty(Tag::find($tag))) {
    //             unset($tagsArray[$key]);
    //         }
    //     }
    // }
    
        if(!empty($data['services'])){
            $apartment->services()->sync($data['services']);
        }


        
        if ($updated) {
            return redirect()->route('host.show', $apartment);
        } else {
            abort(404);
        }

    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        $apartment->delete();

        return redirect()->route('host.index')->with('delete', " You deleted the post with id: $apartment->id");
    }
}
