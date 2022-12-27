<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title"    => $this->faker->company(),
            "quantity" => $this->faker->numberBetween(1,100),
            "price"    => $this->faker->randomFloat(2,100,1000),
            "status"   => 1,
            "user_id"  => 1
        ];
    }
}
