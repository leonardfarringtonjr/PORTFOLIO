<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    // YOU HAVE TO SET METHODS TO PUBLIC, OTHERWISE THEY CANNOT BE USED OUTSIDE OF A CLASS THEY ARE IN
    // THIS METHOD DEFINES A RELATIONSHIP BETWEEN 2 MODELS
    public function category(){
        return $this->belongsTo(Category::class); // BELONGSTO -> ESTABLISHES A RELATIONSHIP BETWEEN 2 MODELS // belongsTo(Category::class) -> EACH PORTFOLIO ITEM IS CONNECTED TO ONE CATEGORY
    }

}
