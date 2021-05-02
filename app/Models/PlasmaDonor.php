<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlasmaDonor extends Model
{
    use HasFactory;
    protected $table="plasma_donors";
    protected $guarded = [];
}
