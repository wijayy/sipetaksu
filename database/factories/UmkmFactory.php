<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Umkm>
 */
class UmkmFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'nama' => fake()->sentence(2, false),
            'kontak' => '00977907678',
            "jamBuka" => fake()->time(),
            "slug" => fake()->slug(2, false),
            "jamTutup" => fake()->time(),
            "deskripsi" => fake()->paragraph(),
            "alamat" => fake()->address(),
            'categories_id' => Categories::factory(),
            'user_id' => User::factory(),
            'image' => 'umkm/produk.png',
            "dilihat" => mt_rand(0, 20),
            "maps" => "https://maps.app.goo.gl/y1WTrMhsaeeTE1347"
        ];
    }
}
