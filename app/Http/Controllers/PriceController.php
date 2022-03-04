<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertPricesRequest;
use App\Http\Resources\PricesCollection;
use App\Repositories\PriceRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request, PriceRepositoryInterface $repo): JsonResponse
    {
        $request->validate([
            'per_page' => 'integer|min:1|max:1000',
            'page' => 'integer|min:1',
        ]);

        $perPage = $request->input('per_page') ?: 15;
        $page = $request->input('page') ?: 1;

        $collection = new PricesCollection($repo->paginate($perPage, $page));

        return response()->json($collection);
    }

    public function show(ProductRepositoryInterface $repo, $id): JsonResponse
    {
        return response()->json($repo->getPrices($id));
    }

    public function update(UpsertPricesRequest $request, ProductRepositoryInterface $repo, $id): JsonResponse
    {
        $prices = $repo->upsertPrices($id, $request->input('prices'));

        return response()->json($prices);
    }
}
