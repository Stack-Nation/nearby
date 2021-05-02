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
            "name" => "nullable",
            "contact_name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "beds" => "nullable",
            "bed_oxygen" => "nullable",
            "bed_nono" => "nullable",
            "bed_ac" => "nullable",
            "bed_noac" => "nullable",
            "icu" => "nullable",
            "vantilator" => "nullable",
            "price" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = Hospital::findOrFail($id);
        $resource->name = $request->name;
        $resource->contact_name = $request->contact_name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->beds = $request->beds;
        $resource->bed_oxygen = $request->bed_oxygen;
        $resource->bed_nono = $request->bed_nono;
        $resource->bed_ac = $request->bed_ac;
        $resource->bed_noac = $request->bed_noac;
        $resource->icu = $request->icu;
        $resource->vantilator = $request->vantilator;
        $resource->price = $request->price;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = PlasmaDonor::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->blood_group = $request->blood_group;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "price" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = TestingFacility::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = Ambulance::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = VaccinationCenter::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "price" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = OxygenAvailability::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "categories" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = Medicine::findOrFail($id);
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->categories = json_encode($request->categories);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
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
            "name" => "nullable",
            "phone" => "nullable",
            "type" => "nullable",
            "hours" => "nullable",
            "diet" => "nullable",
            "delivery" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
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
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status===NULL?$resource->status:$request->status;
        $request->session()->flash('success', "Resource edited");
        return redirect()->back();
    }
}
