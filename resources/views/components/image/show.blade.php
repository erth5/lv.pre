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
    <form action="{{ url('image/' . $image->id) }}">
        @csrf
        @method('DELETE')
        {{-- <a href="delete/{{ $image->id }}">remove</a> --}}
        <button type="submit" value="submit">remove</button>

        @method('PUT')
        <input type="text" name="edit">
        <button type="submit" value="submit">rename(edit)</button>
    </form>

    {{-- https://laravel.com/docs/9.x/routing#form-method-spoofing
        Nutzte route anstatt url - besonders bei ressources ctr
        method="ist immer get oder post"
        PUT, PATCH, or DELETE gibt es in actions nicht --}}
        {{$image='null'}}
    <form action="{{ route('image.update'), [$image] }}" enctype="multipart/form-data">
        {{-- @csrf --}}
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="image" @error('image') is-invalid @enderror>
        @error('image')
            <span style="color:red;">{{ $message }}</span>
        @enderror
        <button type="submit" value="image">update</button>
    </form>
@endif
