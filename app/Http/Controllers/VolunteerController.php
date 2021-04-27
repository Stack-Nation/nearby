<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index(){
            return view("volunteer.apply");
    }
    public function apply(Request $request){
        $this->validate($request,[
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "category" => "required",
        ]);
        $volunteer = new Volunteer;
        $volunteer->name = $request->name;
        $volunteer->email = $request->email;
        $volunteer->phone = $request->phone;
        $volunteer->category = $request->category;
        $volunteer->save();
        $request->session()->flash('success', "You have successfully applied for volunteer position. We will send you your login credentials in 24-48 hrs");
        return redirect()->back();
    }
}
