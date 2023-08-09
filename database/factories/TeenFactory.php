<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teen>
 */
class TeenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name,
            'last_name'=>$this->faker->lastName,
            'identification'=>$this->faker->numberBetween(1000000,9999999),
            'birthdate'=>$this->faker->date,
            'nationality'=>$this->faker->word,
            'scholarship'=>'PRIMARIA',
            'level'=>$this->faker->numberBetween(1,12),
            'address'=>$this->faker->address,
        ];
    }
}
