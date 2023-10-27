<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['url'];
    protected $fillable = ['title','description','price','quantity','is_active','is_featured','user_id','category_id','is_approved'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->morphMany(File::class,'fileable');
    }
    public function imageOne(){
        return $this->morphOne(File::class,'fileable');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function getPriceAttribute($value){
    //     return '$'.$value;
    // }
    
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->imageOne->url);
    }

}
