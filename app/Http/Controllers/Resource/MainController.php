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

class MainController extends Controller
{
    public function hospitals(){
        $hospitals = Hospital::where("visibility",1)->latest()->get();
        return view("resources.hospitals")->with([
            "hospitals" => $hospitals
        ]);
    }
    public function plasma(){
        $plasma = PlasmaDonor::where("visibility",1)->latest()->get();
        return view("resources.plasma")->with([
            "plasma" => $plasma
        ]);
    }
    public function testings(){
        $testings = TestingFacility::where("visibility",1)->latest()->get();
        return view("resources.testings")->with([
            "testings" => $testings
        ]);
    }
    public function ambulances(){
        $ambulances = Ambulance::where("visibility",1)->latest()->get();
        return view("resources.ambulances")->with([
            "ambulances" => $ambulances
        ]);
    }
    public function vaccinations(){
        $vaccinations = VaccinationCenter::where("visibility",1)->latest()->get();
        return view("resources.vaccinations")->with([
            "vaccinations" => $vaccinations
        ]);
    }
    public function oxygens(){
        $oxygens = OxygenAvailability::where("visibility",1)->latest()->get();
        return view("resources.oxygens")->with([
            "oxygens" => $oxygens
        ]);
    }
    public function medicines(){
        $medicines = Medicine::where("visibility",1)->latest()->get();
        return view("resources.medicines")->with([
            "medicines" => $medicines
        ]);
    }
    public function meals(){
        $meals = Meal::where("visibility",1)->latest()->get();
        return view("resources.meals")->with([
            "meals" => $meals
        ]);
    }
}
