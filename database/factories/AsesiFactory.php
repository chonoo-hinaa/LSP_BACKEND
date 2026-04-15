<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asesi>
 */
class AsesiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_peserta' => 'ASI' . fake()->unique()->numerify('######'),
            'nama' => fake()->name(),
            'kelas' => fake()->randomElement(['XII RPL', 'XII BKP', 'XII TKJ', 'XII MM', 'XI RPL', 'XI BKP']),
            'tahun_aktif' => fake()->numberBetween(2020, 2026),
            'nama_pengguna' => fake()->unique()->username(),
            'foto' => null,
        ];
    }
}
