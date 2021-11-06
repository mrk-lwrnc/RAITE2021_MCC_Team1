<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UsersComponent;
use App\Http\Livewire\Centers\CentersComponent;
use App\Http\Livewire\Vaccines\VaccinesComponent;

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

Route::get('/user-management', UsersComponent::class)->name('user.management');
Route::get('/center-management', CentersComponent::class)->name('center.management');
Route::get('/vaccine-management', VaccinesComponent::class)->name('vaccine.management');
