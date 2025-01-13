<?php

namespace Database\Factories;

use App\Models\Umkm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foto>
 */
class FotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'umkm_id' => Umkm::factory(),
            'image' => 'foto/produk.png',
        ];
    }
}
