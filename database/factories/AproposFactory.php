<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apropos>
 */
class AproposFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(6, true),
            'prenom'=>$this->faker->sentence(6, true),
            'email'=>$this->faker->email(6, true),
            'telephone'=>$this->faker->sentence(6, true),
            'adresse'=>$this->faker->address,
            'imag'=>'',
            'apropos'=>$this->faker->sentences(4, true),
        ];
    }
}
