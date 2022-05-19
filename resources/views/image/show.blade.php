@extends('image.layout')
@section('image_views')

    {{-- TODO Image Grid --}}
    @isset($images)
        @forelse ($images as $image)
            {{-- TODO Ressource Route nutzen --}}
            <table style="block">
                <tr>
                    <th>
                        {{ $image->name }}
                    </th>
                </tr>
                <tr>
                    <td>
                        {{-- {{ asset('/storage/app/' . $image->path) }} --}}
                        <img src="{{ asset($image->path) }}" />
                        <img src="{{ asset("$image->path") }}" maxwidth="100" maxheight="100" alt="{{ $image->name }}" />
                    </td>
                </tr>
            </table>
        @empty
            <p>No Images Saved</p>
        @endforelse
    @endisset
@endsection
