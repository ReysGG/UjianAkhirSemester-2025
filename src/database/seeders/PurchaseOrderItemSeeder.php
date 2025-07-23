<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $purchaseOrders = PurchaseOrder::all();

        foreach ($purchaseOrders as $po) {
            // Pastikan kita tidak meminta lebih dari jumlah produk yang tersedia
            $maxCount = min($products->count(), 5); // maksimum 5 item
            $itemsCount = rand(2, $maxCount);

            // Kalau jumlah produk 0, lewati loop ini
            if ($itemsCount === 0) {
                continue;
            }

            $selectedProducts = $products->random($itemsCount);

            foreach ($selectedProducts as $product) {
                $quantity = rand(1, 20);
                $unitPrice = $product->purchase_price ?: rand(10000, 50000);
                $totalPrice = $quantity * $unitPrice;

                PurchaseOrderItem::create([
                    'purchase_order_id' => $po->id,
                    'product_id' => $product->id,
                    'quantity_ordered' => $quantity,
                    'quantity_received' => rand(0, $quantity),
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);
            }
        }
    }
}
