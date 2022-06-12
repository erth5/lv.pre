@extends('image.layout')
@section('image_views')
    @forelse ($images as $image)
        <div style="display: inline-block">
            <x-image.index :image=$image />
        </div>
    @empty
        <p>No Images Saved</p>
    @endforelse
@endsection
