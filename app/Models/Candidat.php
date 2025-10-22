<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = [
        'lastName',
        'firstName',
        'nationality',
        'age',
        'weight',
        'height',
        'shortDescription',
        'fullDescription',
        'profilePhoto'
    ];
}
