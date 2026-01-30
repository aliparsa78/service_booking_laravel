<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
        'room_id','title','is_active','image_path'
    ];
    use HasFactory;
}
