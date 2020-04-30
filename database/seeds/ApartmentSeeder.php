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
        for ($i = 0; $i < 200 ; $i++) {

          $imgs = [
            'images/img_1.jpg',
            'images/img_2.jpg',
            'images/img_3.jpg',
            'images/img_4.jpg',
            'images/img_6.jpg',
            'images/img_7.jpg',
            'images/img_8.jpg',
            'images/img_9.jpg',
            'images/img_10.jpg',
            'images/img_11.jpg',
            'images/img_12.jpg'
          ];

          $titles = [
              'Appartamento di charme con patio',
              'The smallest apartment with the biggest view',
              'Tornabuoni panoramic apartment',
              'Oricellari luxury apartment',
              'Apartment city centre',
              'Loft panoramico con ascensore',
              'Luxury seafront studio',
              'Apt between city center and beach',
              'Splendida vista sul mare',
              'Terraced houses in a residence',
              'Modern and central apartment',
              'Bilocale fronte mare, panorama ineguagliabile',
              'Grazioso appartamento vista mare',
              'Studio flat with air conditioning',
              'Grazioso appartamento ben servito',
              'Relaxing and design apartment',
              'Nice studio flat'
          ];
          $cities = [
            'Roma', 'Firenze', 'Bologna', 'Milano', 'Rimini', 'Napoli', 'Palermo', 'Venezia', 'Siena', 'Terni', 'Perugia', 'Assisi'
          ];

          $newApartment = new Apartment;
          $newApartment->user_id= User::inRandomOrder()->first()->id;
          $newApartment->title = $titles[array_rand($titles)];
          $newApartment->description = $faker->realtext(1000);
          $newApartment->rooms = rand(1, 3);
          $newApartment->beds = rand(1, 3);
          $newApartment->bathroom = rand(1, 3);
          $newApartment->square_meters = rand(20, 500);
          $newApartment->lat = rand(4380, 4482) / 100;
          $newApartment->lon = rand(1040, 1220) / 100;
          $newApartment->address = $faker->address();
          $newApartment->city = $cities[array_rand($cities)];
          $newApartment->dist = rand(1, 20);
          $newApartment->main_img = $imgs[array_rand($imgs)];
          $newApartment->published = rand(0, 1);
          $newApartment->save();
        }
    }
}
