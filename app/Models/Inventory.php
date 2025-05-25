<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'kode_barang',
        'nama_barang' ,
        'jumlah_barang',
        'satuan_barang',
        'harga_beli',
        'status_barang',
    ];
}
