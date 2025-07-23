<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            WarehouseSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            StockSeeder::class,
            StockMovementSeeder::class,
            PurchaseOrderSeeder::class,
            PurchaseOrderItemSeeder::class,
        ]);
    }
}
