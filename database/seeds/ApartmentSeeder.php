<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Faker\Factory as Faker;
use App\Apartment;
use App\User;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $faker = Faker::create('it_IT');
        for ($i=0; $i <40 ; $i++) {

          $newApartment = new Apartment;
          $newApartment->user_id= User::inRandomOrder()->first()->id;
          $newApartment->title = $faker->realText($maxNbChars = 30, $indexSize = 3);
          $newApartment->description = $faker->realtext(1000);
          $newApartment->rooms = rand(1, 10);
          $newApartment->bathroom = rand(1, 3);
          $newApartment->square_meters = rand(40, 500);
          $newApartment->lat = $faker->latitude();
          $newApartment->lon = $faker->longitude();
          $newApartment->main_img = "https://picsum.photos/id/" . rand(1, 100) . '/1200/800';

          $newApartment->save(); 


        }
    }
}
