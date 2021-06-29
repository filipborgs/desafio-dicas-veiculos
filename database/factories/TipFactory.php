<?php

namespace Database\Factories;

use App\Models\Tip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'tip' => $this->faker->text(),
            'id_user' => User::factory(),
            'id_vehicle' => Vehicle::factory()
        ];
    }
}
