@extends('debug.main')
@section('c')

    @empty($users)
        <!-- Fehler? -->
        No data
    @endempty

    @isset($users)
        <h3>
            @foreach ($users as $user)
                {{ $user->name }}
                {{ $user->email }}
                <blockquote></blockquote>

                {{ $user->person()->get('surname') }}
                {{ $user->person()->get('last_name') }}
                {{ $user->person()->get('username') }}
                <blockquote></blockquote>
            @endforeach
        </h3>
    @endisset

@endsection
