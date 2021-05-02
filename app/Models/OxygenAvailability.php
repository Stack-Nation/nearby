<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OxygenAvailability extends Model
{
    use HasFactory;
    protected $table = "oxygen_availabilities";
    protected $guarded = [];
}
