<?php

namespace Database\Factories;
use App\Models\Sitemap;

use Illuminate\Database\Eloquent\Factories\Factory;

class SitemapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Sitemap::class;

    public function definition()
    {
        return [
            'url' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'description' => $this->faker->text
        ];
    }
}
