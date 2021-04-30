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

class MainController extends Controller
{
    public function index(){
        return view("resources.index");
    }
    public function hospital(Request $request){
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
        $resource = new Hospital;
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
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function plasma(Request $request){
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
        $resource = new PlasmaDonor;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->blood_group = $request->blood_group;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function testing(Request $request){
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
        $resource = new TestingFacility;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function ambulance(Request $request){
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
        $resource = new Ambulance;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function vaccination(Request $request){
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
        $resource = new VaccinationCenter;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function oxygen(Request $request){
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
        $resource = new OxygenAvailability;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->price = $request->price;
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
    public function medicines(Request $request){
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
        $resource = new Medicine;
        $resource->name = $request->name;
        $resource->phone = $request->phone;
        $resource->categories = json_encode($request->categories);
        $resource->description = $request->description;
        $resource->address = json_encode(["lat"=>$request->lat,"lon"=>$request->lon]);
        $resource->pin_code = $request->pin_code;
        $resource->landmark = $request->landmark;
        $resource->status = $request->status;
        $resource->save();
        $request->session()->flash('success', "Resource added");
        return redirect()->back();
    }
}
