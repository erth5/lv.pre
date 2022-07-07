@extends('debug.layout')
@section('c')

    @empty($users)
        <!-- Fehler? -->
        No data
    @endempty

    @isset($users)
        <h3>
            <table>
                <tr>
                    <th>name</th>
                    <th>role</th>
                    <th>permission</th>
                </tr>
                @forelse ($users as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td>{{ $user->prename }}</td>
                        <td style="word-break:break-all;word-wrap:break-word">{{ $user->getRoleNames() }}</td>
                        <td style="word-break:break-all;word-wrap:break-word">{{ $user->getPermissionNames() }}</td>
                    </tr>
                @empty
                    <p>No Database Entrys</p>
                @endforelse
            </table>
        </h3>
    @endisset

@endsection
