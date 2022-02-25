<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => $this->faker->numberBetween(1,50),
            'description' => $this->faker->paragraph(),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
