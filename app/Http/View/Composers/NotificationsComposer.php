<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class NotificationsComposer
{
    public function compose(View $view)
    {
        $newNotificationsCount = Notification::whereNull('read_at')->count();
        Log::debug('New notifications count: ' . $newNotificationsCount); // Add this line for debugging
        $view->with('newNotificationsCount', $newNotificationsCount);
    }
}
