<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'race' => 1,
            'age' => 21,
            'height' => 180,
            'weight' => 60,
            'boobs_size' => 2,
            'hair_color' => 'green'
        ];
    }
}
