<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [
            [
                'name' => 'Gudang Pusat Jakarta',
                'code' => 'WH-JKT-001',
                'address' => 'Jl. Industri No. 88, Jakarta',
                'manager' => 'Dewi Sartika',
            ],
            [
                'name' => 'Gudang Bandung Barat',
                'code' => 'WH-BDG-002',
                'address' => 'Jl. Soekarno Hatta No. 123, Bandung',
                'manager' => 'Agus Salim',
            ],
            [
                'name' => 'Gudang Surabaya Timur',
                'code' => 'WH-SBY-003',
                'address' => 'Jl. Raya Merr No. 45, Surabaya',
                'manager' => 'Andi Firmansyah',
            ],
        ];

        foreach ($warehouses as $data) {
            Warehouse::firstOrCreate(['code' => $data['code']], $data);
        }
    }
}
