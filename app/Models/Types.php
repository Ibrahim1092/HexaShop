<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $fillable = ['type'];
    use HasFactory;
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
