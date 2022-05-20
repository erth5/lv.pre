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
                        {{-- // einsetzen in path funktioniert nicht? --}}
                        {{ asset($image->path) }}
                        {{-- <img src="{{ asset($image->path) }}" maxwidth="100" maxheight="100" alt="{{ $image->name }}" /> --}}
                        {{-- <img src="{{ asset('storage/yn05gYmMjLx5zS0JIcyGOOMbMGaC9tBsOGcGmttr.jpg') }}" width='50'
                            height='50' /> --}}
                        <img src="{{ asset($image->path) }}" width='150' height='50' />
                    </td>
                </tr>
            </table>
        @empty
            <p>No Images Saved</p>
        @endforelse
    @endisset
@endsection
