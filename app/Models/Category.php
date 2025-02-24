<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'name',
        'slug',
        'description',
        'image',
        'parent_id',
        'status'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
