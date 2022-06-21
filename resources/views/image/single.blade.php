@extends('image.layout')
@section('image_views')
    @if (isset($image))
        <x-image.index :image=$image />
    @else
        <p>No Image Found</p>
    @endif
@endsection
