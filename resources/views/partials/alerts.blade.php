@if (session('alert'))
    <x-alert level="{{session('alert')['type']}}" :message="session('alert')['message']" />
@endif
