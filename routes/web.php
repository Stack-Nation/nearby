<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController as Main;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\VolunteerController as AdminVolunteer;
use App\Http\Controllers\Admin\ResourceController as AdminResource;
use App\Http\Controllers\Admin\DisclaimerController as AdminDisclaimer;
use App\Http\Controllers\Admin\HelplineController as AdminHelpline;
use App\Http\Controllers\Admin\MenuController as AdminMenu;

// Volunteer Application
use App\Http\Controllers\VolunteerController as Volunteer;

// Helpline
use App\Http\Controllers\HelplineController as Helpline;

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
require __DIR__.'/auth.php';

Route::middleware(['auth'])->name("admin.")->prefix("admin")->group(function () {
    Route::get("dashboard",[AdminDashboard::class,"index"])->name("dashboard");
    Route::name("volunteers.")->prefix("volunteers")->group(function () {
        Route::get("pending",[AdminVolunteer::class,"pending"])->name("pending");
        Route::get("approved",[AdminVolunteer::class,"approved"])->name("approved");
        Route::post("approve",[AdminVolunteer::class,"approve"])->name("approve");
        Route::post("delete",[AdminVolunteer::class,"delete"])->name("delete");
    });
    Route::name("resources.")->prefix("resources")->group(function () {
        Route::get("hospital",[AdminResource::class,"hospitals"])->name("hospital");
        Route::get("plasma",[AdminResource::class,"plasma"])->name("plasma");
        Route::get("testing",[AdminResource::class,"testings"])->name("testing");
        Route::get("ambulance",[AdminResource::class,"ambulances"])->name("ambulance");
        Route::get("vaccination",[AdminResource::class,"vaccinations"])->name("vaccination");
        Route::get("oxygen",[AdminResource::class,"oxygens"])->name("oxygen");
        Route::get("medicines",[AdminResource::class,"medicines"])->name("medicines");
        Route::get("meals",[AdminResource::class,"meals"])->name("meals");

        Route::post("hospital/add",[AdminResource::class,"hospitalsAdd"])->name("hospital.add");
        Route::post("plasma/add",[AdminResource::class,"plasmaAdd"])->name("plasma.add");
        Route::post("testing/add",[AdminResource::class,"testingsAdd"])->name("testing.add");
        Route::post("ambulance/add",[AdminResource::class,"ambulancesAdd"])->name("ambulance.add");
        Route::post("vaccination/add",[AdminResource::class,"vaccinationsAdd"])->name("vaccination.add");
        Route::post("oxygen/add",[AdminResource::class,"oxygensAdd"])->name("oxygen.add");
        Route::post("medicines/add",[AdminResource::class,"medicinesAdd"])->name("medicines.add");
        Route::post("meals/add",[AdminResource::class,"mealsAdd"])->name("meals.add");

        Route::get("hospital/verify/{id}",[AdminResource::class,"hospitalVerify"])->name("hospital.verify");
        Route::get("plasma/verify/{id}",[AdminResource::class,"plasmaVerify"])->name("plasma.verify");
        Route::get("testing/verify/{id}",[AdminResource::class,"testingVerify"])->name("testing.verify");
        Route::get("ambulance/verify/{id}",[AdminResource::class,"ambulanceVerify"])->name("ambulance.verify");
        Route::get("vaccination/verify/{id}",[AdminResource::class,"vaccinationVerify"])->name("vaccination.verify");
        Route::get("oxygen/verify/{id}",[AdminResource::class,"oxygenVerify"])->name("oxygen.verify");
        Route::get("medicines/verify/{id}",[AdminResource::class,"medicinesVerify"])->name("medicines.verify");
        Route::get("meals/verify/{id}",[AdminResource::class,"mealsVerify"])->name("meals.verify");
    });
    Route::get("disclaimer",[AdminDisclaimer::class,"index"])->name("disclaimer");
    Route::post("disclaimer",[AdminDisclaimer::class,"store"])->name("disclaimer");
    Route::post("disclaimer/edit",[AdminDisclaimer::class,"edit"])->name("disclaimer.edit");

    Route::get("helpline",[AdminHelpline::class,"index"])->name("helpline");
    Route::post("helpline",[AdminHelpline::class,"store"])->name("helpline");
    Route::post("helpline/edit",[AdminHelpline::class,"edit"])->name("helpline.edit");
    Route::post("helpline/delete",[AdminHelpline::class,"delete"])->name("helpline.delete");

    Route::get("menu",[AdminMenu::class,"index"])->name("menu");
    Route::post("menu",[AdminMenu::class,"store"])->name("menu");
    Route::post("menu/edit",[AdminMenu::class,"edit"])->name("menu.edit");
    Route::post("menu/delete",[AdminMenu::class,"delete"])->name("menu.delete");
});

Route::get("helplines",[Helpline::class,"index"])->name("helpline");

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

