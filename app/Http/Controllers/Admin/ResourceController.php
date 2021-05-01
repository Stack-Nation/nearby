<?php

namespace App\Http\Controllers\Admin;

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

class ResourceController extends Controller
{
    public function hospitals(){
        $hospitals = Hospital::where("visibility",1)->latest()->get();
        return view("admin.resources.hospitals")->with([
            "hospitals" => $hospitals
        ]);
    }
    public function hospitalVerify($id,Request $request){
        $resource = Hospital::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function plasma(){
        $plasma = PlasmaDonor::where("visibility",1)->latest()->get();
        return view("admin.resources.plasma")->with([
            "plasma" => $plasma
        ]);
    }
    public function plasmaVerify($id,Request $request){
        $resource = PlasmaDonor::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function testings(){
        $testings = TestingFacility::where("visibility",1)->latest()->get();
        return view("admin.resources.testings")->with([
            "testings" => $testings
        ]);
    }
    public function testingVerify($id,Request $request){
        $resource = TestingFacility::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function ambulances(){
        $ambulances = Ambulance::where("visibility",1)->latest()->get();
        return view("admin.resources.ambulances")->with([
            "ambulances" => $ambulances
        ]);
    }
    public function ambulanceVerify($id,Request $request){
        $resource = Ambulance::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function vaccinations(){
        $vaccinations = VaccinationCenter::where("visibility",1)->latest()->get();
        return view("admin.resources.vaccinations")->with([
            "vaccinations" => $vaccinations
        ]);
    }
    public function vaccinationVerify($id,Request $request){
        $resource = VaccinationCenter::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function oxygens(){
        $oxygens = OxygenAvailability::where("visibility",1)->latest()->get();
        return view("admin.resources.oxygens")->with([
            "oxygens" => $oxygens
        ]);
    }
    public function oxygenVerify($id,Request $request){
        $resource = OxygenAvailability::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function medicines(){
        $medicines = Medicine::where("visibility",1)->latest()->get();
        return view("admin.resources.medicines")->with([
            "medicines" => $medicines
        ]);
    }
    public function medicinesVerify($id,Request $request){
        $resource = Medicine::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
    public function meals(){
        $meals = Meal::where("visibility",1)->latest()->get();
        return view("admin.resources.meals")->with([
            "meals" => $meals
        ]);
    }
    public function mealsVerify($id,Request $request){
        $resource = Meal::findOrFail($id);
        $resource->status = "Verified by ".config("app.name")." team";
        $resource->verified = 1;
        $resource->save();
        $request->session()->flash('success', "Resource Verified");
        return redirect()->back();
    }
}
