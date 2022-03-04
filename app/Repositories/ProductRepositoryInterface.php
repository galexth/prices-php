<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getPrices(string $id): Collection;

    public function upsertPrices(string $id, array $attributes): Collection;
}
