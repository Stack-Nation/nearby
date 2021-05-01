<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disclaimer;

class DisclaimerController extends Controller
{
    public function index(){
        $disclaimer = Disclaimer::first();
        return view("admin.disclaimer")->with([
            "disclaimer" => $disclaimer,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "title" => "required",
            "image" => "required|image",
            "description" => "required",
        ]);
        $disclaimer = new Disclaimer;
        $disclaimer->title = $request->title;
        $disclaimer->description = $request->description;
        if($request->hasFile('image')){
            $path = "assets/disclaimer/";
            $name = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            if(\move_uploaded_file($tmp_name,$path.$name)){
                $disclaimer->image = $name;
                $disclaimer->save();
                $request->session()->flash('success', "Disclaimer Saved");
                return redirect()->back();
            }
        }
        else{
            $request->session()->flash('error', "Image Required");
            return redirect()->back();
        }
    }
    public function edit(Request $request){
        $this->validate($request,[
            "title" => "required",
            "image" => "nullable",
            "description" => "required",
        ]);
        $disclaimer = Disclaimer::first();
        $disclaimer->title = $request->title;
        $disclaimer->description = $request->description;
        if($request->hasFile('image')){
            $path = "assets/disclaimer/";
            $name = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            if(\move_uploaded_file($tmp_name,$path.$name)){
                if($disclaimer->image!==$name){
                    unlink($path.$disclaimer->image);
                }
                $disclaimer->image = $name;
            }
        }
        $disclaimer->save();
        $request->session()->flash('success', "Disclaimer Saved");
        return redirect()->back();
    }
}
