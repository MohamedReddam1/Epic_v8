@if ($user === 'FORMATEUR')
@include('notificationsFormateur', ['notifications' => $notifications,'newNotificationsCount'=>$newNotificationsCount])
@else
@include('notificationsUser', ['notifications' => $notifications,'newNotificationsCount'=>$newNotificationsCount])
@endif