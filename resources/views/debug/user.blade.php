@extends('debug.layout')
@section('c')

    @empty($users)
        <!-- Fehler? -->
        No data
    @endempty

    @isset($users)
        <h3>
            @forelse ($persons as $person)
                {{-- {{ $person->surname }}
                {{ $person->last_name }}
                {{ $person->username }}
            
                {{ $person->user()->get('name') }}
                {{ $person->user()->get('email') }} --}}

                @forelse ($persons->getAttributes() as $attribute)
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