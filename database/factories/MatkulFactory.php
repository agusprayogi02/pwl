<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matkul>
 */
class MatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_matkul' => 'MT' . $this->faker->unique()->randomNumber(4),
            'nama' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph(1),
            'sks' => $this->faker->randomElement([1, 2, 3, 4]),
            'semester' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'dosen' => $this->faker->name,
        ];
    }
}
