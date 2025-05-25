<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;
use Illuminate\Support\Str;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
        Inventory::create([
            'kode_barang' => 'KB' . Str::padLeft($i, 4, '0'),
            'nama_barang' => 'Barang ' . $i,
            'jumlah_barang' => rand(0, 100),
            'satuan_barang' => 'pcs',
            'harga_beli' => rand(1000, 10000),
            'status_barang' => true,
        ]);
}
    }
}
