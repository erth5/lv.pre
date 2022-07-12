@extends('debug.layout')
@section('c')
    <select id="lang">
        {{-- @foreach (Locales::installed() as $locale) --}}
        {{-- <option value="$locale" {{ app()->getLocale() == '$locale' ? 'selected' : '' }}>$locale</option> --}}
        {{-- @endforeach --}}

        {{-- current activated will be the selected --}}
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>Deutsch</option>
        <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>France</option>
    </select>

    <h3>{{ __('debug.sessionLocale') }}
        {{ session()->get('session.locale') }}
    </h3>
    <h3>
        {{ __('debug.appLocale') }}
        {{ app()->getLocale() }}
    </h3>
    <h3>{{ __('debug.configLocale') }}
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
