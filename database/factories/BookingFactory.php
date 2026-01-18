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
            'check_in'=>'2025-12-24',
            'check_out'=>'2025-12-24',
            'status'=>'pending',
            'total_price'=> 343,
            'created_at'=> '2025-11-24',
            'updated_at'=>now(),
        ];
    }
}
