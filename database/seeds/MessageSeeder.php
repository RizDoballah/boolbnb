<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i= 1; $i <= 200 ; $i++) {
          $newMessage = new Message;
          $newMessage->email = $faker->email;
          $newMessage->name = $faker->name;
          $newMessage->body = $faker->realtext(300);
          $newMessage->apartment_id = $i;

          $newMessage->save();


        }
    }
}
