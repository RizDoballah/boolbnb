<?php

use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 40; $i++) {

            $newUser = new User;
            $newUser->name = $faker->name;
            $newUser->email = $faker->email;
            $newUser->password = Hash::make('password');

            $carbon = new Carbon;
            $year = rand(1950, 2000);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $newUser->birth_date = Carbon::create($year, $month, $day);
            $newUser->avatar = 'https://i.pravatar.cc/300';
            $newUser->save();

        }

    }
}
