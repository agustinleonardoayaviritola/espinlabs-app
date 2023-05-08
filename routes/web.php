<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Province\ProvinceCreate;
use App\Http\Livewire\Province\ProvinceUpdate;
use App\Http\Livewire\Province\ProvinceDashboard;

use App\Http\Livewire\Dashboard\Dashboard;



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
    return redirect()->route('login');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    /*     Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */

    Route::get('/dashboard', Dashboard::class, function () {
        return view('livewire.dashboard.dashboard');
    })->name('dashboard');

    //Admin provinces
    Route::get('provinces', ProvinceDashboard::class)->name('provinces.dashboard')->middleware('auth')->middleware('auth', 'role:admin');
    Route::get('province-create', ProvinceCreate::class)->name('province.create')->middleware('auth')->middleware('auth', 'role:admin');
    Route::get('province-update/{slug}', ProvinceUpdate::class)->name('province.update')->middleware('auth')->middleware('auth', 'role:admin');

});
