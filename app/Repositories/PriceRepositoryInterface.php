<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface PriceRepositoryInterface
{
    public function paginate(int $perPage = 15, int $page = 1): LengthAwarePaginator;
}
