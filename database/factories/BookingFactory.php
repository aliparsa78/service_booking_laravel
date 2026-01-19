<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> 1,
            'room_id'=> 5,
            'check_in'=>'2026-1-26',
            'check_out'=>'2026-2-1',
            'status'=>'pending',
            'total_price'=> 988,
            'created_at'=> '2026-1-25',
        ];
    }
}
