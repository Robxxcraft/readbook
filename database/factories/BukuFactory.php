<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $judul = fake()->text(60);
        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'gambar' => 'https://picsum.photos/id/'.rand(10, 1084).'/500/600',
            'tahun_terbit' => fake()->date(),
            'jumlah' => fake()->numberBetween(1, 250),
            'pengarang' => fake()->name(),
            'rak_id' => rand(1, \App\Models\Rak::count())
        ];
    }
}
