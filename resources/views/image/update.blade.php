@extends('image.layout')
@section('image_views')
    <form action="{{ route('image/' . image->id) }}" method="PUT" enctype="multipart/form-data">
        @csrf
        <label for="inputImage">Image:</label>
        <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">

        @error('image')
            <span style="color:red;">{{ $message }}</span>
        @enderror

    </form>
@endsection
