<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraddresses extends Model
{
    use HasFactory;
    protected $fillable =[
        "user_id",
        "name",
        "mobileno",
        "pincode",
        "locality",
        "address_area_and_street",
        "city_or_district_or_town",
        "state",
        "landmark",
        "alternate_phone"
    ];
}
