<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

// Volunteer Application
use App\Http\Controllers\VolunteerController as Volunteer;

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
})->name("index");

Route::middleware(['auth'])->name("admin.")->prefix("admin")->group(function () {
    Route::get("dashboard",[AdminDashboard::class,"index"])->name("dashboard");
});


Route::get("apply-volunteer",[Volunteer::class,"index"])->name("apply-volunteer");
Route::post("apply-volunteer",[Volunteer::class,"apply"])->name("apply-volunteer");

require __DIR__.'/auth.php';
