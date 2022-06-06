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
        <img src="image/{{ Session::get('image') }}">
    @endif

    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="inputImage">Image:</label>
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">

        @error('image')
            <span style="color:red;">{{ $message }}</span>
        @enderror
        <button type="submit">Upload</button>
    </form>

    <form action="{{ route('image.debug') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="inputImage">Debug:</label>
        <input type="file" name="debug">
        <button type="submit">Debug</button>
    </form>

    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br> 
    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br> 
    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>

    @php
    $image = session::get('image');
    @endphp
@endsection
