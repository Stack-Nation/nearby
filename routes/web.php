<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController as Main;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\VolunteerController as AdminVolunteer;

// Volunteer Application
use App\Http\Controllers\VolunteerController as Volunteer;

// Resouces
use App\Http\Controllers\Resource\MainController as ResourceMain;
use App\Http\Controllers\Resource\AddController as ResourceAdd;
use App\Http\Controllers\Resource\EditController as ResourceEdit;

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
    Route::name("volunteers.")->prefix("volunteers")->group(function () {
        Route::get("pending",[AdminVolunteer::class,"pending"])->name("pending");
        Route::get("approved",[AdminVolunteer::class,"approved"])->name("approved");
        Route::post("approve",[AdminVolunteer::class,"approve"])->name("approve");
        Route::post("delete",[AdminVolunteer::class,"delete"])->name("delete");
    });
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
    Route::name("edit.")->prefix("edit")->group(function () {
        Route::get("hospital/{id}",[ResourceEdit::class,"hospital"])->name("hospital");
        Route::get("plasma/{id}",[ResourceEdit::class,"plasma"])->name("plasma");
        Route::get("testing/{id}",[ResourceEdit::class,"testing"])->name("testing");
        Route::get("ambulance/{id}",[ResourceEdit::class,"ambulance"])->name("ambulance");
        Route::get("vaccination/{id}",[ResourceEdit::class,"vaccination"])->name("vaccination");
        Route::get("oxygen/{id}",[ResourceEdit::class,"oxygen"])->name("oxygen");
        Route::get("medicines/{id}",[ResourceEdit::class,"medicines"])->name("medicines");
        Route::get("meals/{id}",[ResourceEdit::class,"meals"])->name("meals");

        Route::post("hospital/{id}",[ResourceEdit::class,"hospitalUpdate"])->name("hospital");
        Route::post("plasma/{id}",[ResourceEdit::class,"plasmaUpdate"])->name("plasma");
        Route::post("testing/{id}",[ResourceEdit::class,"testingUpdate"])->name("testing");
        Route::post("ambulance/{id}",[ResourceEdit::class,"ambulanceUpdate"])->name("ambulance");
        Route::post("vaccination/{id}",[ResourceEdit::class,"vaccinationUpdate"])->name("vaccination");
        Route::post("oxygen/{id}",[ResourceEdit::class,"oxygenUpdate"])->name("oxygen");
        Route::post("medicines/{id}",[ResourceEdit::class,"medicinesUpdate"])->name("medicines");
        Route::post("meals/{id}",[ResourceEdit::class,"mealsUpdate"])->name("meals");
    });
});

require __DIR__.'/auth.php';
