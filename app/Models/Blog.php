<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $fillable = ['name','title','slug','description','is_active','is_featured'];

    public function image()
    {
        return $this->morphOne(File::class, 'fileable');
    }
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image->url);
        } else {
            return 'https://randomuser.me/api/portraits/men/85.jpg';
        }
    }
}
