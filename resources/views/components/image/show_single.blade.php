<p>{{ $image->name }}</p>
@if ($image->remove_time != null)
    <p>deleted at: {{ $image->remove_time }}</p>
    <form action="{{ url('image/' . $image->id . '/restore') }}" method="POST">
        @csrf
        <button type="submit">restore</button>
    </form>
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
