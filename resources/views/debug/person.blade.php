@extends('debug.layout')
@section('c')

    @empty($users)
        <!-- Fehler? -->
        No data
    @endempty

    @isset($users)
        <h3>
            @forelse ($users as $user)
            {{-- TODO User verändert sich nicht - statische Methode wählen --}}
                {{-- {{ $user->name }}
                {{ $user->email }}
            
                {{ $user->person()->get('surname') }}
                {{ $user->person()->get('last_name') }}
                {{ $user->person()->get('username') }} --}}

                @forelse ($user->getAttributes() as $attribute)
                    {{ $attribute }},
                @empty
                    <p>No Columns</p>
                @endforelse
                <blockquote></blockquote>
            @empty
                <p>No Database Entrys</p>
            @endforelse
        </h3>
    @endisset

@endsection
