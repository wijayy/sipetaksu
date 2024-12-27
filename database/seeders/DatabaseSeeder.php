<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Foto;
use App\Models\Umkm;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'admin@admin.com',
            "is_admin" => true
        ]);
        User::factory()->create([
            'email' => 'user@admin.com',
        ]);
        $categories = [
            [
                "nama" => "kerajinan",
                "slug" => "kerajinan",
                "image" => "categories/kerajinan.png"
            ],
            [
                "nama" => "makanan",
                "slug" => "makanan",
                "image" => "categories/makanan.png"
            ],
            [
                "nama" => "lainnya",
                "slug" => "lainnya",
                "image" => "categories/lainnya.png"
            ],
        ];

        foreach ($categories as $item) {
            Categories::factory(1)->create($item);
        }


        Umkm::factory(20)->recycle([Categories::all(), User::all()])->create();
        Foto::factory(500)->recycle(Umkm::all())->create();
    }
}
