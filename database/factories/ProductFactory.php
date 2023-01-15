<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence;
        return [
            'name' => $name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomNumber(2),
            'slug' => Str::slug($name),
            'image' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),//Pluck extrai o id da tabela
            'id_category' => Category::pluck('id')->random(),
        ];
    }
}
