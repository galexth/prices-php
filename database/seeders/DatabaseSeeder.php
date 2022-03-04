<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Price::truncate();

        Product::factory()
            ->count(10000)
            ->create()->each(function (Product $item) {
                $item->prices()->createMany(Price::factory()->count(100)->make()->toArray());
            });
    }
}
