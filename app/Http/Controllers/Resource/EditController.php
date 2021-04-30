<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\PlasmaDonor;
use App\Models\TestingFacility;
use App\Models\Ambulance;
use App\Models\VaccinationCenter;
use App\Models\OxygenAvailability;
use App\Models\Medicine;
use App\Models\Meal;

class EditController extends Controller
{
    public function hospital($id){
        $hospital = Hospital::findOrFail($id);
        return view("resources.edit.hospitals")->with([
            "hospital" => $hospital
        ]);
    }
    public function plasma($id){
        $plasma = PlasmaDonor::findOrFail($id);
        return view("resources.edit.plasma")->with([
            "plasma" => $plasma
        ]);
    }
    public function testing($id){
        $testing = TestingFacility::findOrFail($id);
        return view("resources.edit.testings")->with([
            "testing" => $testing
        ]);
    }
    public function ambulance($id){
        $ambulance = Ambulance::findOrFail($id);
        return view("resources.edit.ambulances")->with([
            "ambulance" => $ambulance
        ]);
    }
    public function vaccination($id){
        $vaccination = VaccinationCenter::findOrFail($id);
        return view("resources.edit.vaccinations")->with([
            "vaccination" => $vaccination
        ]);
    }
    public function oxygen($id){
        $oxygen = OxygenAvailability::findOrFail($id);
        return view("resources.edit.oxygens")->with([
            "oxygen" => $oxygen
        ]);
    }
    public function medicines($id){
        $medicine = Medicine::findOrFail($id);
        return view("resources.edit.medicines")->with([
            "medicine" => $medicine
        ]);
    }
    public function meals($id){
        $meal = Meal::findOrFail($id);
        return view("resources.edit.meals")->with([
            "meal" => $meal
        ]);
    }
}
