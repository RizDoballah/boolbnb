<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $duration = [24, 72, 144];
        $price = [2.99, 5.99, 9.99];

        for ($i=0; $i <= 2; $i++) { 
            
            $sponsorship = new Sponsorship;
            $sponsorship->duration = $duration[$i];
            $sponsorship->price = $price[$i];
            $sponsorship->save();

        }


    }
}
