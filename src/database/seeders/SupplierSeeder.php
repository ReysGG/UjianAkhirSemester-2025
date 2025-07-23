<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT Elektronik Jaya',
                'code' => 'SUP-ELEC01',
                'email' => 'elec@ptjaya.com',
                'phone' => '081234567890',
                'address' => 'Jl. Sudirman No. 10, Jakarta',
                'contact_person' => 'Budi Hartono',
            ],
            [
                'name' => 'CV Pakaian Sejahtera',
                'code' => 'SUP-PAKAIAN02',
                'email' => 'info@pakaian.co.id',
                'phone' => '082233445566',
                'address' => 'Jl. Merdeka No. 20, Bandung',
                'contact_person' => 'Susi Susanti',
            ],
            [
                'name' => 'UD Alat Tulis Hebat',
                'code' => 'SUP-TULIS03',
                'email' => 'tulis@hebat.co.id',
                'phone' => '085566778899',
                'address' => 'Jl. Malioboro No. 5, Yogyakarta',
                'contact_person' => 'Tono',
            ],
        ];

        foreach ($suppliers as $data) {
            Supplier::firstOrCreate(['code' => $data['code']], $data);
        }
    }
}
