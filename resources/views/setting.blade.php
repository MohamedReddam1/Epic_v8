@foreach ($user as $key=>$user)
@if ($user->role === 'FORMATEUR')
@include('settingFormateur', ['user' => $user])
@else
@include('settingUser', ['user' => $user])
@endif
@endforeach