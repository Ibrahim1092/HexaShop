<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $fillable = ['image_on_left','title_image_left','description_image_left','men_image','description_men_image','women_image','description_women_image','kid_image','description_kid_image'];
}
