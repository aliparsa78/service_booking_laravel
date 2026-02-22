<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Room extends Model
{
    use HasFactory;

    public function type():Attribute
    {
       return Attribute::make(
        get: fn($value)=>strtoupper($value)
        );
    }

    public function is_active():Attribute
    {
        return Attribute::make(
            set : fn($value)=>strtoupper($value)
        );
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active','on')->get();
    }
    public function scopeNotActive($query)
    {
        return $query->where('is_active','off')->get();
    }


}
