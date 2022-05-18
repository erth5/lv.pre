<!DOCTYPE html>
<html>

<head>
    <title>Image Handling</title>
</head>

<body>
    <div class="container">








        {{ session('status') }}
        {{ session('imageName') }}

        <h2>Laravel 9 Image Upload</h2>

        @if ($message = Session::get('success'))
            <div>
                <button type="button">×</button>
                <strong style="text-align: center">{{ $message }}</strong>
            </div>
            <img src="images/{{ Session::get('image') }}">
        @endif

        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label" for="inputImage">Image:</label>
            <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">

            @error('image')
                <span style="color:red;">{{ $message }}</span>
            @enderror
            <button type="submit">Upload</button>
        </form>
    </div>
    <br>
    @php
        $images = session::get('images');
    @endphp

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

</body>

</html>
