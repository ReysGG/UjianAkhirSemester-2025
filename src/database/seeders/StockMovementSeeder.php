<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // pengisi movement
        $products = Product::all();
        $warehouses = Warehouse::all();

        foreach ($products as $product) {
            foreach ($warehouses as $warehouse) {
                // Simulasi: ambil stok terakhir
                $previousStock = rand(10, 50);

                // Simulasi stok masuk
                $inQuantity = rand(5, 20);
                StockMovement::create([
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouse->id,
                    'type' => 'in',
                    'quantity' => $inQuantity,
                    'previous_stock' => $previousStock,
                    'current_stock' => $previousStock + $inQuantity,
                    'reference_type' => 'PurchaseOrder',
                    'reference_id' => null,
                    'notes' => 'Pengisian stok awal',
                    'user_id' => $user->id,
                ]);

                // Simulasi stok keluar
                $previousStock = $previousStock + $inQuantity;
                $outQuantity = rand(1, 10);
                StockMovement::create([
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouse->id,
                    'type' => 'out',
                    'quantity' => -$outQuantity,
                    'previous_stock' => $previousStock,
                    'current_stock' => $previousStock - $outQuantity,
                    'reference_type' => 'Sale',
                    'reference_id' => null,
                    'notes' => 'Penjualan produk',
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
