<?php

use App\Livewire\CarDetails;
use App\Livewire\CarList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', CarList::class)->name('cars');
Route::get('/{car}', CarDetails::class)->name('cars.show');
