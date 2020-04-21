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

                for ($y=1; $y < rand(2, 6); $y++) {
                    DB::table('apartment_service')->insert(
                        array('apartment_id' => $i, 'service_id' => rand(1, 6))
                    );
                }

             }

      }
}
