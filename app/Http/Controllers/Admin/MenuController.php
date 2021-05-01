<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::latest()->paginate(15);
        return view("admin.menus")->with([
            "menus" => $menus
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            "title" => "required",
            "link" => "required",
            "icon" => "required"
        ]);
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->save();
        $request->session()->flash('success', "Menu added");
        return redirect()->back();
    }
    public function edit(Request $request){
        $this->validate($request,[
            "id" => "required",
            "title" => "required",
            "link" => "required",
            "icon" => "required"
        ]);
        $menu = Menu::findOrFail($request->id);
        $menu->title = $request->title;
        $menu->link = $request->link;
        $menu->icon = $request->icon;
        $menu->save();
        $request->session()->flash('success', "Menu updated");
        return redirect()->back();
    }
    public function delete(Request $request){
        $this->validate($request,[
            "id" => "required",
        ]);
        $menu = Menu::findOrFail($request->id)->delete();
        $request->session()->flash('success', "Menu deleted");
        return redirect()->back();
    }
}
