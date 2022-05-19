
    {{-- TODO Image Grid --}}
    @isset($images)
        @forelse ($images as $image)
            {{-- TODO Ressource Route nutzen --}}
            <img src="{{ asset("$image->path") }}" maxwidth="100" maxheight="100" alt="{{ $image->name }}" />
            <img src="{{ asset('storage/' . $images[0]->image) }} " />
        @empty
            <p>No Images Saved</p>
        @endforelse
    @endisset