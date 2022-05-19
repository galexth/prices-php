<?php

namespace App\Repositories;

use App\Models\Price;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentPriceRepository implements PriceRepositoryInterface
{
    public function paginate(int $perPage = 15, int $page = 1): LengthAwarePaginator
    {
        return Price::orderBy('price')->paginate($perPage, ['*'], 'page', $page);
    }
}
