@if (session()->has('flash_message'))
    <div class="alert alert-{{session('flash_level')}}">
    {{ session('flash_message') }}</div>
@endif