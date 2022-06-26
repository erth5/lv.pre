@extends('image.layout')
@section('image_views')
    @if (isset($image))
        <input type="text" name="edit" id="edit">
        <input type="submit" value="submit">
    @else
        <p>Kein Bild vorhanden</p>
    @endif
@endsection
