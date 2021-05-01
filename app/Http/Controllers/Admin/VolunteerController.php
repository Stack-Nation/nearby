<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalMail;

class VolunteerController extends Controller
{
    public function pending(){
        $volunteers = Volunteer::latest()->paginate(15);
        return view("admin.volunteers.pending")->with([
            "volunteers"=>$volunteers
        ]);
    }
    public function approved(){
        $volunteers = User::where("role","Volunteer")->latest()->paginate(15);
        return view("admin.volunteers.approved")->with([
            "volunteers"=>$volunteers
        ]);
    }
    public function approve(Request $request){
        $this->validate($request,[
            "id" => "required"
        ]);
        $password = "VolunteerNearby";
        $volunteer = Volunteer::findOrFail($request->id);
        $user = new User;
        $user->name = $volunteer->name;
        $user->email = $volunteer->email;
        $user->phone = $volunteer->phone;
        $user->category = $volunteer->category;
        $user->role = "Volunteer";
        $user->password = Hash::make($password.$volunteer->id);
        $user->save();
        $volunteer->delete();

        // Mail
        $sub = "Congrats! You're now a volunteer";
        $message="<p>Dear ".$user->name.",</p><p>You're volunteering request has been approved.</p>. Your password is: ".$password.$volunteer->id."<p>Please click here to login: <a href='".route("login")."'>Login</a></p>";
        $data = array('sub'=>$sub,'message'=>$message);
        Mail::to($user->email)->send(new GlobalMail($data));

        $request->session()->flash('success', "Volunteer approved");
        return redirect()->back();
    }
    public function delete(Request $request){
        $this->validate($request,[
            "id" => "required"
        ]);
        $volunteer = Volunteer::findOrFail($request->id)->delete();

        $request->session()->flash('success', "Volunteer deleted");
        return redirect()->back();
    }
}
