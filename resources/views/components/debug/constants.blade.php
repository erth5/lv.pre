{{ $constants = Config::all() }}
@forelse ($constants as $constant)
@if (isarray())
    
@else
    
@endif
    {{ $constant }}
@empty
    <p>nothing found</p>
@endforelse
