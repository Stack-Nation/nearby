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

class AddController extends Controller
{
    public function index(){
        return view("resources.add");
    }
    public function hospital(Request $request){
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
        $resource = new Hospital;
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
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function plasma(Request $request){
        $this->validate($request,[
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = new PlasmaDonor;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->blood_group = $request->blood_group;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function testing(Request $request){
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
        $resource = new TestingFacility;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function ambulance(Request $request){
        $this->validate($request,[
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = new Ambulance;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function vaccination(Request $request){
        $this->validate($request,[
            "name" => "nullable",
            "phone" => "nullable",
            "description" => "nullable",
            "lat" => "nullable",
            "lon" => "nullable",
            
            "landmark" => "nullable",
            "status" => "nullable",
        ]);
        $resource = new VaccinationCenter;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function oxygen(Request $request){
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
        $resource = new OxygenAvailability;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function medicines(Request $request){
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
        $resource = new Medicine;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->categories = json_encode($request->categories);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function meals(Request $request){
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
        $resource = new Meal;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->type = $request->type;
        $resource->hours = json_encode($request->hours);
        $resource->diet = json_encode($request->diet);
        $resource->delivery = json_encode($request->delivery);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
}
