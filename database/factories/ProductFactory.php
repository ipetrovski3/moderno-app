<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'price' => $this->faker->numberBetween(10, 2000),
            'category_id' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->realTextBetween(20, 100),
            'image' => 'https://picsum.photos/200/300',
            'active' => true,
            'option' => 1,
        ];
    }
}
