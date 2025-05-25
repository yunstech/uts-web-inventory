<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Barang
            </h2>
            <a href="{{ route('inventories.index') }}"
            class="inline-flex items-center justify-center gap-2 
                    bg-blue-600 hover:bg-blue-700 
                    dark:bg-blue-500 dark:hover:bg-blue-600 
                    text-white font-medium 
                    px-6 py-2 rounded-lg shadow 
                    hover:shadow-md 
                    transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('inventories.update', $inventory) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-md shadow-md">
            @csrf
            @method('PUT')

            <!-- Kode Barang Field -->
            <div class="mb-4">
                <label for="kode_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ $inventory->kode_barang }}" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

            <!-- Nama Barang Field -->
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ $inventory->nama_barang }}" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

            <!-- Jumlah Barang Field -->
            <div class="mb-4">
                <label for="jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" value="{{ $inventory->jumlah_barang }}" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

            <!-- Satuan Barang Field -->
            <div class="mb-4">
                <label for="satuan_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Satuan Barang</label>
                <select name="satuan_barang" id="satuan_barang" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                    <option value="pcs" {{ $inventory->satuan_barang == 'pcs' ? 'selected' : '' }}>pcs</option>
                    <option value="kg" {{ $inventory->satuan_barang == 'kg' ? 'selected' : '' }}>kg</option>
                    <option value="liter" {{ $inventory->satuan_barang == 'liter' ? 'selected' : '' }}>liter</option>
                    <option value="meter" {{ $inventory->satuan_barang == 'meter' ? 'selected' : '' }}>meter</option>
                </select>
            </div>

            <!-- Harga Beli Field -->
            <div class="mb-4">
                <label for="harga_beli" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Beli</label>
                <input type="number" step="0.01" name="harga_beli" value="{{ $inventory->harga_beli }}" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200" required>
            </div>

            <!-- Status Barang Field -->
            <div class="mb-4">
                <label for="status_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Barang</label><br>
                <div class="flex gap-4 text-white items-center">
                    <input type="radio" name="status_barang" value="1" {{ $inventory->status_barang == 1 ? 'checked' : '' }} class="text-blue-600 dark:text-blue-400"> Available
                    <input type="radio" name="status_barang" value="0" {{ $inventory->status_barang == 0 ? 'checked' : '' }} class="text-blue-600 dark:text-blue-400"> Not Available
                </div>
            </div>

            <!-- Update Button -->
            <button type="submit" class="w-full bg-blue-500 dark:bg-blue-700 text-white p-2 rounded-md hover:bg-blue-400 dark:hover:bg-blue-600">Update</button>
        </form>
    </div>
</x-app-layout>
