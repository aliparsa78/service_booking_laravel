<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\RejectionNotification;
use App\Models\User;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(5)->first();

        $user->notify(new RejectionNotification($request->message));
        dd('Notification sent');
    }
}
