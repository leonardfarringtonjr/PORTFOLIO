<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSectionSetting extends Model
{
    use HasFactory;

    protected $fillable = [ // FILLABLE SPECIFIES WHICH FIELDS ARE ALLOWED TO BE MASS-ASSIGNED // NEEDED FOR MAINTAINING SECURITY // USEFUL FOR MANAGING THE FIELDS THAT CAN BE UPDATED VIA USER INPUT
        'title',
        'sub_title',
    ];
}
