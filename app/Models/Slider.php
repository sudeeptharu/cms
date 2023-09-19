<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'url',
        'image',
        'order',
        'is_published'
    ];
    protected $attributes=[
        'is_published'=>false
    ];
    protected $casts = [
        'is_published' => 'boolean',
    ];
}
