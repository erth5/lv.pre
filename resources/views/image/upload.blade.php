@extends('image.layout')
@section('image_views')
    {{ session('status') }}
    {{ session('imageName') }}

    <h2>Laravel 9 Image Upload</h2>

    @if ($message = Session::get('success'))
        <div>
            <button type="button">×</button>
            <strong style="text-align: center">{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
    @endif

    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="inputImage">Image:</label>
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">

        @error('image')
            <span style="color:red;">{{ $message }}</span>
        @enderror
        <button type="submit">Upload</button>
    </form>

    <br>
    @php
    $images = session::get('images');
    @endphp
@endsection
