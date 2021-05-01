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
    public function hospitalUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "contact_name" => "required",
            "phone" => "required",
            "description" => "required",
            "beds" => "required",
            "price" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = Hospital::findOrFail($id);
        $resource->name = $request->name;
        $resource->contact_name = $request->contact_name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->beds = $request->beds;
        $resource->price = $request->price;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function plasma($id){
        $plasma = PlasmaDonor::findOrFail($id);
        return view("resources.edit.plasma")->with([
            "plasma" => $plasma
        ]);
    }
    public function plasmaUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = PlasmaDonor::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->blood_group = $request->blood_group;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function testing($id){
        $testing = TestingFacility::findOrFail($id);
        return view("resources.edit.testings")->with([
            "testing" => $testing
        ]);
    }
    public function testingUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "description" => "required",
            "price" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = TestingFacility::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function ambulance($id){
        $ambulance = Ambulance::findOrFail($id);
        return view("resources.edit.ambulances")->with([
            "ambulance" => $ambulance
        ]);
    }
    public function ambulanceUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = Ambulance::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function vaccination($id){
        $vaccination = VaccinationCenter::findOrFail($id);
        return view("resources.edit.vaccinations")->with([
            "vaccination" => $vaccination
        ]);
    }
    public function vaccinationUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = VaccinationCenter::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function oxygen($id){
        $oxygen = OxygenAvailability::findOrFail($id);
        return view("resources.edit.oxygens")->with([
            "oxygen" => $oxygen
        ]);
    }
    public function oxygenUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "price" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = OxygenAvailability::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function medicines($id){
        $medicine = Medicine::findOrFail($id);
        return view("resources.edit.medicines")->with([
            "medicine" => $medicine
        ]);
    }
    public function medicinesUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "categories" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = Medicine::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->categories = json_encode($request->categories);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
    public function meals($id){
        $meal = Meal::findOrFail($id);
        return view("resources.edit.meals")->with([
            "meal" => $meal
        ]);
    }
    public function mealsUpdate(Request $request,$id){
        $this->validate($request,[
            "name" => "required",
            "phone" => "required",
            "type" => "required",
            "hours" => "required",
            "diet" => "required",
            "delivery" => "required",
            "description" => "required",
            "lat" => "required",
            "lon" => "required",
            "pin_code" => "required",
            "landmark" => "required",
            "status" => "required",
        ]);
        $resource = Meal::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->type = $request->type;
        $resource->hours = json_encode($request->hours);
        $resource->diet = json_encode($request->diet);
        $resource->delivery = json_encode($request->delivery);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
}
