<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop ASUS X441',
                'sku' => 'LPT-ASUS-001',
                'barcode' => '8991234567890',
                'description' => 'Laptop ringan untuk keperluan kerja dan sekolah.',
                'category_id' => 1, // Elektronik
                'supplier_id' => 1,
                'unit' => 'pcs',
                'purchase_price' => 5500000,
                'selling_price' => 6000000,
                'minimum_stock' => 10,
            ],
            [
                'name' => 'Kaos Oblong Polos Hitam',
                'sku' => 'KSP-HITAM-002',
                'barcode' => '8991234567891',
                'description' => 'Kaos cotton combed 30s warna hitam.',
                'category_id' => 2, // Pakaian
                'supplier_id' => 2,
                'unit' => 'pcs',
                'purchase_price' => 25000,
                'selling_price' => 35000,
                'minimum_stock' => 50,
            ],
            [
                'name' => 'Pulpen Snowman 0.5mm',
                'sku' => 'PLP-SNOW-003',
                'barcode' => '8991234567892',
                'description' => 'Pulpen tinta gel halus dan cepat kering.',
                'category_id' => 3, // Alat Tulis
                'supplier_id' => 3,
                'unit' => 'pcs',
                'purchase_price' => 3000,
                'selling_price' => 5000,
                'minimum_stock' => 100,
            ],
        ];

        foreach ($products as $data) {
            Product::firstOrCreate(['sku' => $data['sku']], $data);
        }
    }
}
