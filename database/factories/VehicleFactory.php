<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'id_brand' => Brand::factory(),
            'type' => Arr::random(['CAR', 'MOTORCYCLE', 'TRUCK']),
            'model' => $this->faker->word,
            'version' => $this->faker->word
        ];
    }
}
