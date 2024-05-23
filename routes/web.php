<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
Route::get('/', function () {
    return view('base');
});
Route::get('/scanner', function () {
    return view('scanner');
});
Route::get('/plant', [PlantController::class,'view'])->name('plant');
Route::get('plants/pdf', [PlantController::class, 'pdf']);
Route::get('/plants/csv-all', [PlantController::class, 'generateCSV']);
Route::post('/plants/import-csv', [PlantController::class, 'importCSV'])->name('plants.import-csv');
