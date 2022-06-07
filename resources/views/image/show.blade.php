@extends('image.layout')
@section('image_views')
    @if (isset($image))
        <x-image.single_image :image=$image />
    @else
        <p>No Image Found</p>
    @endif
@endsection
