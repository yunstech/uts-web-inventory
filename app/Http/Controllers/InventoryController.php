<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::query()
            ->orderBy('id', 'desc')
            ->get();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventories.create');
    }

     public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:inventories,kode_barang',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer|min:0',
            'satuan_barang' => 'required',
            'harga_beli' => 'required|numeric|min:0',
            'status_barang' => 'required|boolean',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventories.index')->with('success', 'Barang ditambahkan.');
    }

    public function useItem(Request $request, Inventory $inventory)
    {
        $request->validate(['jumlah' => 'required|integer|min:1']);
        $jumlah = $request->jumlah;

        if ($jumlah > $inventory->jumlah_barang) {
            return back()->withErrors('Jumlah pemakaian melebihi stok!');
        }

        $inventory->jumlah_barang -= $jumlah;
        if ($inventory->jumlah_barang == 0) {
            $inventory->status_barang = false;
        }
        $inventory->save();

        return back()->with('success', 'Barang berhasil digunakan.');
    }
     
    
    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return redirect()->route('inventories.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function addStock(Request $request, Inventory $inventory)
    {
        $request->validate(['jumlah' => 'required|integer|min:1']);
        $inventory->jumlah_barang += $request->jumlah;

        if (!$inventory->status_barang && $inventory->jumlah_barang > 0) {
            $inventory->status_barang = true;
        }

        $inventory->save();
        return back()->with('success', 'Stok berhasil ditambahkan.');
    }


}
