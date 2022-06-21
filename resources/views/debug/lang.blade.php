@extends('debug.layout')
@section('c')
    <select id="lang">
        {{-- current activated will be the selected --}}
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="de" {{ session()->get('locale') == 'de' ? 'selected' : '' }}>Deutsch</option>
        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
        {{-- <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option> --}}
    </select>
    
    <h3>{{__('debug.lang_browser')}}
        {{session()->get('locale')}}
    </h3>
    <h3>{{ __('messages.lang-message') }}
        {{ Config::get('app.locale') }}
    </h3>

    <script type="text/javascript">
        var lang = null;
        var url = "{{ route('changeLang') }}";
        var value = null;
        if (document.getElementById('lang') != null) {
            selector = document.getElementById('lang')
            // console.log('lang selector id: ' + document.getElementById('lang'));
            // console.log('lang selector query: ' + document.querySelector('#lang'));
            document.querySelector('#lang').addEventListener('change', function() {
                lang = selector.options[selector.selectedIndex].value
                window.location.href = url + "?lang=" + lang;
                console.log('new language set: ' + selector.options[selector.selectedIndex].value);
            });
        }
    </script>

    @if (isset($data))
        {{-- {{ $data }} --}}
        @forelse ($data as $list)
            @if (is_array($list))
                @foreach ($list as $dat)
                    @if (is_array($dat))
                        <p>
                            @foreach ($dat as $sub)
                                {{ $sub }}
                            @endforeach
                        </p>
                    @elseif (is_bool($dat))
                        <p>{{ $dat }}</p>
                    @else
                        {{ $dat }}
                    @endif
                @endforeach
            @else
                <p> {{ $list }}</p>
            @endif

        @empty
            <p>No Element in data</p>
        @endforelse
    @else
        <p>No Debug Data</p>
    @endif
@endsection
