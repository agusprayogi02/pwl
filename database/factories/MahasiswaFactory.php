<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->numerify('##########'),
            'nama' => $this->faker->name(),
            'jk' => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'hp' => $this->faker->unique()->numerify('08#########'),
            'id_prodi' => $this->faker->randomElement([1, 2, 3]),
            'kelas_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
        ];
    }
}
