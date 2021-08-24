<?php

use App\Http\Controllers\ApocalypseController;
use App\Actions\Apocalypse\StoreAnApocalypse;
use App\Actions\Apocalypse\StoreAClass;
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

Route::post('apocalypse', StoreAnApocalypse::class)->name('apocalypse.store');
Route::post('class', StoreAClass::class)->name('class.store');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('apocalypse/create', function() {
        return view('apocalypse.create');
    })->name('apocalypse.create');

    Route::get('apocalypse/{apocalypse}/class/create', function($apocalypse) {
        return view('class.create', compact('apocalypse'));
    })->name('class.create');

    Route::get('campaign/create', function() {
        return view('campaign.create');
    })->name('campaign.create');
});