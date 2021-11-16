<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'course',
        'year',
        'section',
        'status',
        'outing_duration',
        'contact',
        'reason'
    ];

}
