<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table="tracking_time";

    protected $fillable = [
        'name',
        'phone',
        'start_time',
        'end_time',
        'updated_by'
    ];
}
