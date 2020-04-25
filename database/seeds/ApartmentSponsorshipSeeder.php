<?php

use App\Apartment;
use App\Sponsorship;
use Illuminate\Database\Seeder;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::take(10)->get();
        
        for ($i=1; $i <= 10; $i++) {
            $apartment = Apartment::find($i);
            $rand1 = rand(1, 3);
            $apartment->sponsorships()->sync([$rand1]);
         }
    }
}
