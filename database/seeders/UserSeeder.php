<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {

             $buyer = 'buyer';
             $seller = 'seller';

             User::create([
                'custom_id' => Str::random(8),
                'full_name' => $faker->name,
                'email' => $faker->email,
                'contact_no' => '1234567891',
                'address' => $faker->sentence,
                'password' => Hash::make('12345678'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
