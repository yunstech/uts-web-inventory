<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daftar Barang
            </h2>
            <a href="{{ route('inventories.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-md transition duration-300">Tambah Barang</a>
        </div>
    </x-slot>

    <div class="container mx-auto p-6 space-y-6">
        
        @if (session('success'))
            <div class="alert alert-success bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <table class="w-full min-w-[1000px] table-auto text-sm">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Kode</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Nama</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Jumlah</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Satuan</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Harga</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Status</th>
                <th class="px-4 py-3 text-gray-700 dark:text-gray-300">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $item)
            <tr class="border-b dark:border-gray-600">
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $item->kode_barang }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $item->nama_barang }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $item->jumlah_barang }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $item->satuan_barang }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ number_format($item->harga_beli, 2) }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $item->status_barang ? 'Available' : 'Not Available' }}</td>
                <td class="px-4 py-3 space-y-2 sm:space-x-4 sm:space-y-0 flex flex-col sm:flex-row">
                    <a href="{{ route('inventories.show', $item) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">Lihat</a>
                    <a href="{{ route('inventories.edit', $item) }}" class="text-yellow-600 hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-300">Edit</a>
                    <form action="{{ route('inventories.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                    <form action="{{ route('inventories.use', $item) }}" method="POST" class="flex gap-2 items-center">
                        @csrf
                        <input type="number" name="jumlah" placeholder="Qty" class="w-20 p-2 border dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md" required>
                        <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded-md hover:bg-gray-600">Pakai</button>
                    </form>
                    <form action="{{ route('inventories.add', $item) }}" method="POST" class="flex gap-2 items-center">
                        @csrf
                        <input type="number" name="jumlah" placeholder="Qty" class="w-20 p-2 border dark:bg-gray-700 dark:text-white dark:border-gray-600 rounded-md" required>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600">Tambah</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</x-app-layout>
