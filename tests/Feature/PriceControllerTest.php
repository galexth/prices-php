<?php

namespace Tests\Feature;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PriceControllerTest extends TestCase
{
    public function test_index()
    {
        $product = Product::factory()
            ->has(Price::factory()->count(50))
            ->create();

        $response = $this->get("/api/prices");
        $response->assertStatus(200);

        $firstPrice = $product->prices()->first();

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 15)
                ->has('data.0', fn ($json) =>
                    $json->where('id', $firstPrice->id)
                    ->where('price', $firstPrice->price)
                    ->where('product_id', $firstPrice->product_id)
                )->etc()
            );
    }

    public function test_index_with_params()
    {
        Product::factory()
            ->has(Price::factory()->count(50))
            ->create();

        $response = $this->get("/api/prices?page=2&per_page=20");
        $response->assertStatus(200);

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 20)
                ->where('current_page', 2)
                ->etc()
            );
    }

    public function test_show()
    {
        $product = Product::factory()
            ->has(Price::factory()->count(5))
            ->create();

        $response = $this->get("/api/products/{$product->id}/prices");
        $response->assertStatus(200);

        $firstPrice = $product->prices()->first();

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has(5)->first(fn ($json) =>
                $json->where('id', $firstPrice->id)
                    ->where('price', $firstPrice->price)
                    ->where('product_id', $firstPrice->product_id)
                )
            );
    }

    public function test_update()
    {
        $product = Product::factory()
            ->has(Price::factory()->count(5))
            ->create();

        $data = Price::factory()->count(2)->make()->toArray();

        $response = $this->put("/api/prices/{$product->id}", ['prices' => $data]);

        $response->assertJson($product->prices->toArray());
    }
}
