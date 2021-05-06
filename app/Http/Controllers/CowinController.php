<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CowinController extends Controller
{
    public function index(){
        return view("cowin");
    }
}
