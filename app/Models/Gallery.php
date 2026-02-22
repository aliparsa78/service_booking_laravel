<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model
{

    protected $fillable=[
        'room_id','title','is_active','image_path'
    ];

    use HasFactory;
    public function title():Attribute
    {
        return Attribute::make(
            set: fn($value)=>strtoupper($value)
        );
    }
}
