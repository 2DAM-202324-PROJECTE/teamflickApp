<?php

use App\Http\Controllers\CategoriesController;
use App\Livewire\Categories\Createorupdate;
use App\Livewire\Categories\Index;
use App\Livewire\Medias\IndexMedias;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/categories', Index::class)->name('categories');

Route::get('/categories/create', Createorupdate::class);
Route::get('/categories/update/{id}', Createorupdate::class)->name('categories.update');


Route::get('/medias', IndexMedias::class);

