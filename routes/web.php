<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return redirect()->route('inventories.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('inventories', InventoryController::class);
    Route::post('inventories/{inventory}/use', [InventoryController::class, 'useItem'])->name('inventories.use');
    Route::post('inventories/{inventory}/add', [InventoryController::class, 'addStock'])->name('inventories.add');
    
    Route::get('/about', [ProfileController::class, 'about'])->name('about');
});

require __DIR__.'/auth.php';
