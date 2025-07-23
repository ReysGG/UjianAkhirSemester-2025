<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'description' => 'Produk elektronik seperti laptop, HP, dll.'],
            ['name' => 'Pakaian', 'description' => 'Baju, celana, jaket, dan aksesoris.'],
            ['name' => 'Alat Tulis', 'description' => 'Perlengkapan kantor dan sekolah.'],
            ['name' => 'Makanan', 'description' => 'Makanan kemasan dan instan.'],
            ['name' => 'Minuman', 'description' => 'Air mineral, kopi, teh, dan lainnya.'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                ]
            );
        }
    }
}
