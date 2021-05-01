<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Helpline;

class HelplineController extends Controller
{
    public function index(){
        $helplines = Helpline::latest()->paginate(15);
        return view("admin.helplines")->with([
            "helplines" => $helplines
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "state" => "required|unique:helplines",
            "phone" => "required"
        ]);
        $helpline = new Helpline;
        $helpline->state = $request->state;
        $helpline->phone = $request->phone;
        $helpline->save();
        $request->session()->flash('success', "Helpline added");
        return redirect()->back();
    }
    public function edit(Request $request){
        $this->validate($request,[
            "id" => "required",
            "phone" => "required"
        ]);
        $helpline = Helpline::findOrFail($request->id);
        $helpline->phone = $request->phone;
        $helpline->save();
        $request->session()->flash('success', "Helpline updated");
        return redirect()->back();
    }
    public function delete(Request $request){
        $this->validate($request,[
            "id" => "required",
        ]);
        $helpline = Helpline::findOrFail($request->id)->delete();
        $request->session()->flash('success', "Helpline deleted");
        return redirect()->back();
    }
}
