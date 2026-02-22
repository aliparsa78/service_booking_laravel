<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $fillable = ['user_id','room_id','check_in','check_out','total_price'];
    use HasFactory;
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }
    // Scoping data
    public function scopeConfirmed($query)
    {
        return $query->where('status','confirmed')->get();
    }
}
