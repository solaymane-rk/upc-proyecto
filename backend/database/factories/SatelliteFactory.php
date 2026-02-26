<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Satellite>
 */
class SatelliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Sat-' . $this->faker->lexify('???') . '-' . $this->faker->numerify('##'),
            'norad_id' => $this->faker->unique()->numerify('#####'),
            'altitude' => $this->faker->numberBetween(400, 35000), // Desde LEO hasta GEO
            'velocity' => $this->faker->numberBetween(7000, 28000),
            'battery' => $this->faker->numberBetween(15, 100),
            'status' => $this->faker->randomElement(['Operativo', 'Mantenimiento']),
            'mode' => $this->faker->randomElement(['Standby', 'Científico', 'Maniobra']),
            'anomalies_count' => 0,
        ];
    }
}
