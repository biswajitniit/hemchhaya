<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attribute extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'column_name',
        'column_slug',
        'column_type',
        'column_validation',
        'status',
     ];

}
