@foreach ($user as $key=>$user)
@if ($user->role === 'formateur')
@include('changePasswordFormateur', ['user' => $user])
@else
@include('changePasswordUser', ['user' => $user])
@endif
@endforeach