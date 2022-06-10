<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['nombre','descripcion'];
    function comics(){
        return $this->hasMany(Comic::class);
    }
}
