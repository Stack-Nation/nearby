<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingFacility extends Model
{
    use HasFactory;
    protected $table = "testing_facilities";
    protected $guarded = [];
}
