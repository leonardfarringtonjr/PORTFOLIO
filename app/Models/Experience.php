<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    // WHENEVER YOU MASS ASSIGN DATA YOU MUST ADD FILLABLE COLUMNS INTO THIS FILLABLE PROPERTY
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
