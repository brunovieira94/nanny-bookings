<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NannyBooking;
use App\Models\User;
use Faker\Factory as Faker;

class NannyBookingSeeder extends Seeder
{
    public function run()
    {
        User::factory(5)->create();
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            $user = User::inRandomOrder()->first();
            NannyBooking::create([
                'user_id' => $user->id,
                'title' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'start_datetime' => $faker->dateTimeBetween('now', '+1 month'),
                'end_datetime' => $faker->dateTimeBetween('+1 month', '+2 months'),
            ]);
        }
    }
}
