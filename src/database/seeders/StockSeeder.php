<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            [
                'product_id' => 1, // Laptop ASUS
                'warehouse_id' => 1,
                'quantity' => 50,
                'reserved_quantity' => 10,
            ],
            [
                'product_id' => 2, // Kaos Oblong
                'warehouse_id' => 1,
                'quantity' => 200,
                'reserved_quantity' => 25,
            ],
            [
                'product_id' => 3, // Pulpen Snowman
                'warehouse_id' => 2,
                'quantity' => 500,
                'reserved_quantity' => 0,
            ],
        ];

        foreach ($stocks as $data) {
            Stock::firstOrCreate([
                'product_id' => $data['product_id'],
                'warehouse_id' => $data['warehouse_id'],
            ], $data);
        }
    }
}
