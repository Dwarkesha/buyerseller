<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $limit = 1000;
       
        for ($i = 0; $i < $limit; $i++) {

            Product::create([
                'custom_id' => Str::random(8),
                'name' => $faker->word,
                'price' => $faker->numberBetween(100, 5000),
                'user_id' => $faker->randomElement(User::pluck('id')),
                'category_id' => $faker->randomElement(Category::pluck('id')),
                'image' => 'product/images/hyQQuSSTMoDFWayeO00wYgbcqERfR7tUBBaQR99N.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
