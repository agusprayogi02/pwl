<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => fake()->sentence(3),
            'slug' => fake()->slug(2),
            'gambar' => fake()->imageUrl(240, 180, 'news', true),
            'isi' => fake()->paragraph(1),
            'penulis' => fake()->firstName(),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
