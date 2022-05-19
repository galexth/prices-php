<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $query = DB::table('prices');

        Product::factory()
            ->count(10000)
            ->create()->each(function (Product $item) use ($query) {
                $query->insert(
                    Price::factory()->count(100)->make([
                        'product_id' => $item->id,
                    ])->toArray()
                );
            });
    }
}
