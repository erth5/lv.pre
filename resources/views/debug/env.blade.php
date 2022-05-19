@extends('debug.layout')
@section('c')
    <blockquote></blockquote>
    {{ Request::url() }}
    <blockquote></blockquote>
    @if (env('APP_ENV') == 'local')
        Local Enviroment:
    @endif

    <p>{{ env('DB_CONNECTION', 'default') }}</p>
    <p>{{ env('DB_HOST', 'default') }}</p>
    <p>{{ env('DB_PORT', 'default') }}</p>
@endsection
