<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disclaimer;

class MainController extends Controller
{
    public function index(){
        $disclaimer = Disclaimer::first();
        return view("welcome")->with([
            "disclaimer" => $disclaimer
        ]);
    }
}
