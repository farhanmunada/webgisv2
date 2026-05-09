<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPanen extends Model
{
    protected $fillable = [
        'kecamatan',
        'hasil_robusta',
        'hasil_arabika',
    ];
}
