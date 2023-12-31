<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','subtitle','description','draft', 'quote','excerpt','image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,);
    }
}
