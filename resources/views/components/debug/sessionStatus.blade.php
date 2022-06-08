@if (session('status'))
    {{ session('status') }}
@endif
@if (session('statusInfo'))
    {{ session('statusInfo') }}
@endif
@if (session('statusSuccess'))
    {{ session('statusSuccess') }}
@endif
@if (session('statusError'))
    {{ session('statusError') }}
@endif
