@extends('image.layout')
@section('image_views')
    @if (isset($image))
        <x-image.show_single :image=$image />
    @else
        <p>No Image Found</p>
    @endif
@endsection
