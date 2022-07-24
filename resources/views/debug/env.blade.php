@extends('debug.layout')
@section('c')
    <blockquote></blockquote>
    {{ Request::url() }}
    <blockquote></blockquote>
    @if (env('APP_ENV') == 'local')
        Local Enviroment:
    @endif

    {{-- <p>{{ config('database.connections') }}</p> --}}
    <blockquote></blockquote>
    <p>default DB: {{DB::getDatabaseName()}}</p>

    <p>typ: {{ env('DB_CONNECTION', 'default') }}</p>
    <p>DB IP: {{ env('DB_HOST', 'default') }}</p>
    <p>DB Port: {{ env('DB_PORT', 'default') }}</p>
    <blockquote></blockquote>
    <br>

    <p>day: {{ date('D') }}</p>
    <p>week: {{ date('W') }}</p>
    <p>month: {{ date('M') }}</p>
    <p>date: {{ date(now()) }}</p>
    <br>
    <p> locale: {{ Lang::locale() }} </p>
    <p> appConfig_locale: {{ Config::get('app.locale') }}, {{ app()->getLocale() }}</p>
@endsection
