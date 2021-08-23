<?php

use App\Http\Controllers\ApocalypseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('apocalypse/create', [ApocalypseController::class, 'create'])->name('apocalypse.create');
Route::post('apocalypse', [ApocalypseController::class, 'store'])->name('apocalypse.store');
Route::get('campaign', [CampaignController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route::get('apocalypse/create', [ApocalypseController::class, 'create']);
    // Route::get('campaign', [CampaignController::class, 'index']);
    //Route::resource('apocalypse', 'ApocalypseController');
});