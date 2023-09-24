<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scroller extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'url'
    ];
}
