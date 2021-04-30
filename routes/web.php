<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController as Main;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

// Volunteer Application
use App\Http\Controllers\VolunteerController as Volunteer;

// Resouces
use App\Http\Controllers\Resource\MainController as ResourceMain;
use App\Http\Controllers\Resource\AddController as ResourceAdd;

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

Route::get('/',[Main::class,"index"])->name("index");

Route::middleware(['auth'])->name("admin.")->prefix("admin")->group(function () {
    Route::get("dashboard",[AdminDashboard::class,"index"])->name("dashboard");
});


Route::get("apply-volunteer",[Volunteer::class,"index"])->name("apply-volunteer");
Route::post("apply-volunteer",[Volunteer::class,"apply"])->name("apply-volunteer");

Route::name("resources.")->prefix("resources")->group(function () {
    Route::get("add",[ResourceAdd::class,"index"])->name("add");
    Route::get("hospital",[ResourceMain::class,"hospitals"])->name("hospital");
    Route::get("plasma",[ResourceMain::class,"plasma"])->name("plasma");
    Route::get("testing",[ResourceMain::class,"testings"])->name("testing");
    Route::get("ambulance",[ResourceMain::class,"ambulances"])->name("ambulance");
    Route::get("vaccination",[ResourceMain::class,"vaccinations"])->name("vaccination");
    Route::get("oxygen",[ResourceMain::class,"oxygens"])->name("oxygen");
    Route::get("medicines",[ResourceMain::class,"medicines"])->name("medicines");
    Route::get("meals",[ResourceMain::class,"meals"])->name("meals");
    Route::name("add.")->prefix("add")->group(function () {
        Route::post("hospital",[ResourceAdd::class,"hospital"])->name("hospital");
        Route::post("plasma",[ResourceAdd::class,"plasma"])->name("plasma");
        Route::post("testing",[ResourceAdd::class,"testing"])->name("testing");
        Route::post("ambulance",[ResourceAdd::class,"ambulance"])->name("ambulance");
        Route::post("vaccination",[ResourceAdd::class,"vaccination"])->name("vaccination");
        Route::post("oxygen",[ResourceAdd::class,"oxygen"])->name("oxygen");
        Route::post("medicines",[ResourceAdd::class,"medicines"])->name("medicines");
        Route::post("meals",[ResourceAdd::class,"meals"])->name("meals");
    });
});

require __DIR__.'/auth.php';
