<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

// Volunteer Application
use App\Http\Controllers\VolunteerController as Volunteer;

// Resouces
use App\Http\Controllers\Resource\MainController as ResourceMain;

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

Route::name("resources.")->prefix("resources")->group(function () {
    Route::get("add",[ResourceMain::class,"index"])->name("add");
    Route::name("add.")->prefix("add")->group(function () {
        Route::post("hospital",[ResourceMain::class,"hospital"])->name("hospital");
        Route::post("plasma",[ResourceMain::class,"plasma"])->name("plasma");
        Route::post("testing",[ResourceMain::class,"testing"])->name("testing");
        Route::post("ambulance",[ResourceMain::class,"ambulance"])->name("ambulance");
        Route::post("vaccination",[ResourceMain::class,"vaccination"])->name("vaccination");
        Route::post("oxygen",[ResourceMain::class,"oxygen"])->name("oxygen");
        Route::post("medicines",[ResourceMain::class,"medicines"])->name("medicines");
    });
});

require __DIR__.'/auth.php';
