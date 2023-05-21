<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priceable = $this->priceable();

        return [
            'price' => 450000,
            'priceable_id' => $priceable::factory(),
            'priceable_type' => $priceable,
        ];
    }

    /**
     * mixed function
     *
     * @return mixed
     */
    public function priceable(): mixed
    {
        return $this->faker->randomElement([
            Course::class,
            Lesson::class
        ]);
    }
}
