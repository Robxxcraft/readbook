<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rak>
 */
class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nama_rak = fake()->text(10);
        return [
            'nama_rak' => $nama_rak,
            'slug' => Str::slug($nama_rak),
            'lokasi' => 'A-'.fake()->currencyCode
        ];
    }
}
