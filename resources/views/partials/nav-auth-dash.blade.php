<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{ url('/') }}" class="btn btn-dark text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        <a href="{{ url('/account') }}" class="btn btn-dark text-sm text-gray-700 dark:text-gray-500 underline">My Account</a>
        <a href="{{url('/logout')}}" class="btn btn-dark">logout</a>       
    </div>
</div>