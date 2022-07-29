<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TenantSeeder>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $typeArray = ['Residential', 'Commercial'];
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'locality' => fake()->address(),
            'type' => $typeArray[rand(0,1)],
            'purpose' => fake()->jobTitle(),
            'rent_amount' => fake()->randomNumber(4)
        ];
    }
}
