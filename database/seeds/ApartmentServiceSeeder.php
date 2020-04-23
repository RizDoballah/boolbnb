<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Service;

class ApartmentServiceSeeder extends Seeder
{
    public function run()
    {
        $apartments = Apartment::all();
        
            for ($i=1; $i <= 40; $i++) {
                $apartment = Apartment::find($i);
                $rand1 = rand(1, 6);
                $rand2 = rand(1, 6);
                $rand3 = rand(1, 6);
                $rand4 = rand(1, 6);
                $apartment->services()->sync([$rand1, $rand2, $rand3, $rand4]);
             }

      }
}
