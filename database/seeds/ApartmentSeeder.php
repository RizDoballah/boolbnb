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

          $imgs = [
            'img/img_1.jpg',
            'img/img_2.jpg',
            'img/img_3.jpg',
            'img/img_4.jpg',
            'img/img_5.jpg',
            'img/img_6.jpg',
          ];

          $newApartment = new Apartment;
          $newApartment->user_id= User::inRandomOrder()->first()->id;
          $newApartment->title = $faker->realText($maxNbChars = 30, $indexSize = 3);
          $newApartment->description = $faker->realtext(1000);
          $newApartment->rooms = rand(1, 10);
          $newApartment->beds = rand(1, 10);
          $newApartment->bathroom = rand(1, 3);
          $newApartment->square_meters = rand(20, 500);
          $newApartment->lat = rand(4550, 4246) / 100;
          $newApartment->lon = rand(1015, 1238) / 100;
          $newApartment->address = $faker->address();
          $newApartment->main_img = $imgs[array_rand($imgs)];
          $newApartment->published = rand(0, 1);

          $newApartment->save();


        }
    }
}
