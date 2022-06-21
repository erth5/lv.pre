@extends('image.layout')
@section('image_views')
    @isset($images)
        @forelse ($images as $image)
            <div style="display: inline-block">
                <x-image.show :image=$image />
            </div>
        @empty
            <p>No Images Saved</p>
        @endforelse
    @else
        <p>No Images object Saved</p>
    @endisset
@endsection
