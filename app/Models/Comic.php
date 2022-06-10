<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $fillable=['nombre','privado','image','editorial','category_id','user_id'];
    function users(){
        return $this->belongsTo(User::class);
    }
    function categories(){
        return $this->belongsTo(Category::class);
    }
    
}
