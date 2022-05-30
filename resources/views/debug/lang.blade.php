 @extends('debug.layout')
 @section('c')
     <select id="lang">
         <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
         <option value="de" selected {{ session()->get('locale') == 'de' ? 'selected' : '' }}>Deutsch</option>
         <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
         <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
     </select>

     <h1>{{ __('messages.language') }}</h1>

     {{ Config::get('app.locale') }}

     <script type="text/javascript">
         var url = "{{ route('debug') }}";
         var value = null;
         if (document.getElementById('lang') != null) {
             selector = document.getElementById('lang')
             // console.log('lang selector id: ' + document.getElementById('lang'));
             // console.log('lang selector query: ' + document.querySelector('#lang'));
             document.querySelector('#lang').addEventListener('change', function() {
                 lang = selector.options[selector.selectedIndex].value
                 console.log('new lang: ' + selector.options[selector.selectedIndex].value);
                 //  window.location.href = url + "?lang=" + lang;
                 {{App::setLocale()}}
             });
         }
     </script>
 @endsection
