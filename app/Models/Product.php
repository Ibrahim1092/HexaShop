<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['images','english_name','arabic_name','english_description','arabic_description','price','slug','category_id','class_id'];
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo('App\Models\Categories','category_id');
    }
    public function class()
    {
        return $this->belongsTo('App\Models\Types','class_id');
    }
    use HasFactory;
}
