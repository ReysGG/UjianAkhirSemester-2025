<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $user = User::first();

        foreach (range(1, 10) as $i) {
            $supplier = $suppliers->random();
            $warehouse = $warehouses->random();

            $subtotal = rand(500000, 5000000);
            $tax = $subtotal * 0.1;
            $total = $subtotal + $tax;

            PurchaseOrder::create([
                'po_number' => 'PO-' . strtoupper(Str::random(6)),
                'supplier_id' => $supplier->id,
                'warehouse_id' => $warehouse->id,
                'order_date' => now()->subDays(rand(5, 20)),
                'expected_date' => now()->addDays(rand(1, 10)),
                'received_date' => rand(0, 1) ? now()->subDays(rand(1, 5)) : null,
                'status' => collect(['draft', 'sent', 'partial', 'received', 'cancelled'])->random(),
                'subtotal' => $subtotal,
                'tax_amount' => $tax,
                'total_amount' => $total,
                'notes' => fake()->sentence(),
                'created_by' => $user->id,
            ]);
        }
    }
}
