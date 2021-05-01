<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helpline;

class HelplineController extends Controller
{
    public function index(){
        $helplines = Helpline::latest()->paginate(15);
        return view("helpline")->with([
            "helplines" => $helplines
        ]);
    }
}
