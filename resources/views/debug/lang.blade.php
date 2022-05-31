@extends('debug.layout')
@section('c')
    <select id="lang">
        {{-- current activated will be the selected --}}
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="de" {{ session()->get('locale') == 'de' ? 'selected' : '' }}>Deutsch</option>
        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
        {{-- <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option> --}}
    </select>

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
                console.log('new lang: ' + selector.options[selector.selectedIndex].value);
                window.location.href = url + "?lang=" + lang;
            });
        }
    </script>
@endsection
