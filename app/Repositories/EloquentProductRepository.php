<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function getPrices(string $id): Collection
    {
        $product = Product::findOrFail($id);

        return $product->prices;
    }

    public function upsertPrices(string $id, array $array): Collection
    {
        $product = Product::findOrFail($id);

        DB::transaction(function () use ($product, $array) {
            $product->prices()->delete();

            $product->prices()->createMany($array);
        });

        return $product->prices;
    }
}
