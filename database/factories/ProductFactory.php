<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->unique()->words(2,true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(1000, 10000),
            'SKU' => 'DIGI' . $this->faker->numberBetween(1000, 10000),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(1, 100),
            'image' => 'digital_' . $this->faker->numberBetween(1,22) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
