<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\PlasmaDonor;
use App\Models\TestingFacility;
use App\Models\Ambulance;
use App\Models\VaccinationCenter;
use App\Models\OxygenAvailability;
use App\Models\Medicine;

class MainController extends Controller
{
    public function index(){
        $hospitals = Hospital::where("visibility",1)->latest()->get();
        $plasma = PlasmaDonor::where("visibility",1)->latest()->get();
        $testings = TestingFacility::where("visibility",1)->latest()->get();
        $ambulances = Ambulance::where("visibility",1)->latest()->get();
        $vaccinations = VaccinationCenter::where("visibility",1)->latest()->get();
        $oxygens = OxygenAvailability::where("visibility",1)->latest()->get();
        $medicines = Medicine::where("visibility",1)->latest()->get();
        return view("welcome")->with([
            "hospitals" => $hospitals,
            "plasma" => $plasma,
            "testings" => $testings,
            "ambulances" => $ambulances,
            "vaccinations" => $vaccinations,
            "oxygens" => $oxygens,
            "medicines" => $medicines,
        ]);
    }
}
