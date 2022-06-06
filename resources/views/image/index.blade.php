@extends('image.layout')
@section('image_views')

    {{-- TODO Image Grid --}}
    @isset($images)
        @forelse ($images as $image)
            {{-- TODO Ressource Route nutzen --}}
            {{-- TODO Wenn gelöscht nicht anzeigen, wen softeddeleete? --}}
            <div style="display: inline-block">
                <p>{{ $image->name }}</p>
                @if ($image->remove_time != null)
                    <p>deleted at: {{ $image->remove_time }}</p>
                    <button type="submit">restore</button>
                @else
                    <p>online</p>
                    <p>{{ asset('storage/' . $image->path) }}</p>

                    <img src="{{ asset('storage/' . $image->path) }}" width='250' />
                    <form action="{{ url('image/' . $image->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        {{-- <a href="delete/{{ $image->id }}">remove</a> --}}
                        <button type="submit" value="submit">remove</button>
                    </form>
                @endif
            </div>
        @empty
            <p>No Images Saved</p>
        @endforelse
    @endisset
@endsection
