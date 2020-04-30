<?php

use App\Apartment;
use App\Sponsorship;
use Carbon\Carbon;
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
        $apartments = Apartment::take(20)->get();

        for ($i=1; $i <= 10; $i++) {
            $apartment = Apartment::find($i);
            $now = Carbon::now()->addHours(24);
            $apartment->sponsorships()->attach(1, ['expires_at' => $now]);

          }

         }
  }
