@extends('debug.layout')
@section('c')
    @isset($data)
        {{ $data }}
        @forelse ($data as $stageOne)
        {{$stageOne}}
        @empty
        @endforelse
    @endisset


    @if (isset($stage))
    @else
    @endif
@endsection
