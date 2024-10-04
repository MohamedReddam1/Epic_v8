@extends('formateur')

@section('formateurtitle', 'Notifications')

@section('extraLinks')
<a href="{{ route('notifications') }}" class="flex items-center text-lg mt-5 py-2.5 px-4 rounded transition duration-200 text-gray-600 hover:bg-purple-600 hover:text-white" id="notifications-link">
    <i class="fas fa-bell mr-3"></i>
    Notifications
    <span id="notifications-count" class="ml-2 bg-red-500 text-white text-sm font-semibold px-2.5 py-0.5 rounded-full {{ $newNotificationsCount == 0 ? 'hidden' : '' }}">
        {{ $newNotificationsCount }}
    </span>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateNotificationsCount() {
        fetch('/notifications/count')
            .then(response => response.json())
            .then(data => {
                const countElement = document.querySelector('#notifications-count');
                if (data.count > 0) {
                    countElement.textContent = data.count;
                    countElement.classList.remove('hidden');
                } else {
                    countElement.classList.add('hidden');
                }
            })
            .catch(error => console.error('Error fetching notifications count:', error));
    }

    // Update notifications count every 30 seconds
    setInterval(updateNotificationsCount, 30000);

    // Initial call to update notifications count on page load
    updateNotificationsCount();
});
</script>
@endsection

@section('contentFormateur')
@if ($notifications->isEmpty())
    <div class="w-9/12 md:w-10/12 lg:w-11/12 h-screen flex items-center justify-center">
        <h1 class="font-semibold text-lg ml-16 text-center md:ml-0 md:mr-44 lg:mr-0">you don't have any notification now</h1>
    </div>
@else
<div class="container mx-auto px-4 mt-10 ml-10 md:ml-0 w-10/12 md:w-full">
    <div class="grid grid-cols-1 gap-4">
        @foreach ($notifications as $notification)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4">
                <p class="text-gray-600 font-bold text-sm lg:text-md">{{ $notification->content }}</p>
            </div>
            <div class="bg-gray-100 px-4 py-2 flex justify-between items-center">
                <p class="text-xs text-purple-600 font-bold">Received: {{ $notification->created_at->diffForHumans() }}</p>
                <div class="flex">
                    <form action="{{ route('deleteNotification', ['id' => $notification->id_notification]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-purple-600 hover:text-purple-800 font-semibold rounded-full text-sm"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection