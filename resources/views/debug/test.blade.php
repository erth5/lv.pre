@extends('debug.layout')
@section('c')
    <x-debug.test />

    @isset($test)
        {{ $test }}
    @endisset
    @isset($example)
        {{ $example }}
    @endisset
@endsection
