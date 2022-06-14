<div style="text-align: center">
    @if (session('status'))
        <p> {{ session('status') }} </p>
    @endif
    @if (session('success'))
        <p> {{ session('success') }} </p>
    @endif
    @if (session('error'))
        <p> {{ session('error') }} </p>
    @endif
</div>

@if (session('statusInfo'))
    <p> {{ session('statusInfo') }} </p>
@endif
@if (session('statusSuccess'))
    <p> {{ session('statusSuccess') }} </p>
@endif
{{-- official, layout-compatible --}}
@if (session('statusError'))
    <p> {{ session('statusError') }} </p>
@endif

@if ($errors->any())
    {{ $errors->first() }}
@endif
