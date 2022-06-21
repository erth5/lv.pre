<p>{{ $image->name }}</p>
@if ($image->remove_time != null)
    <p>deleted at: {{ $image->remove_time }}</p>
    <form action="{{ url('image/' . $image->id . '/restore') }}" method="GET">
        @csrf
        <button type="submit">restore</button>
    </form>
@else
    <p>online</p>
    <p>{{ asset('storage/' . $image->path) }}</p>

    <img src="{{ asset('storage/' . $image->path) }}" width='250' />
    <form action="{{ url('image/' . $image->id) }}" >
        @csrf
        @method('DELETE')
        {{-- <a href="delete/{{ $image->id }}">remove</a> --}}
        <button type="submit" value="submit">remove</button>

        @method('PUT')
        <input type="text" name="update">
        <button type="submit" value="submit">rename(edit)</button>
    </form>

    {{-- <form action="{{ route('image.update') }}" enctype="multipart/form-data"> --}}
    <form method="PATCH" action="{{ url('image/' . $image->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" @error('image') is-invalid @enderror>
        @error('image')
            <span style="color:red;">{{ $message }}</span>
        @enderror
        <button type="submit" value="image">update</button>
    </form>
@endif
