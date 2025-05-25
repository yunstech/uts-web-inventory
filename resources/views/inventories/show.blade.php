<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                Detail Barang
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
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden transition duration-300">
            <div class="p-6">
                <table class="w-full table-fixed border-separate border-spacing-y-3">
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-300 w-1/3">Kode</th>
                            <td class="text-gray-900 dark:text-gray-100">{{ $inventory->kode_barang }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-300">Nama</th>
                            <td class="text-gray-900 dark:text-gray-100">{{ $inventory->nama_barang }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-300">Jumlah</th>
                            <td class="text-gray-900 dark:text-gray-100">{{ $inventory->jumlah_barang }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-300">Satuan</th>
                            <td class="text-gray-900 dark:text-gray-100">{{ $inventory->satuan_barang }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="text-left text-gray-700 dark:text-gray-300">Harga</th>
                            <td class="text-gray-900 dark:text-gray-100">Rp {{ number_format($inventory->harga_beli, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="text-left text-gray-700 dark:text-gray-300">Status</th>
                            <td class="text-gray-900 dark:text-gray-100">
                                @if($inventory->status_barang)
                                    <span class="inline-block px-3 py-1 text-sm font-semibold text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-200 rounded-full">Available</span>
                                @else
                                    <span class="inline-block px-3 py-1 text-sm font-semibold text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-200 rounded-full">Not Available</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
