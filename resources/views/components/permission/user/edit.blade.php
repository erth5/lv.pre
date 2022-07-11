@isset($users)
    <form action="/permission/user" method="POST">
        @csrf
        <label for="users">Nutzer auswählen</label>
        <select name="email" id="users">
            @forelse ($users as $usr)
                <option @isset($user) {{ $user->email == $usr->email ? 'selected' : '' }} @endisset
                    value={{ $usr->email }}>{{ $usr->name }}
                </option>
            @empty
                <option value=null>no users</option>
            @endforelse
        </select>
        <label for="submit_user">Bestätigen</label>
        <button type="submit" name="submit" value="submit">Wählen</button>
    </form>
@endisset

@isset($user)
    <form action="/permission/user" method="POST">
        @csrf
        <label for="add">Berechtigung auswählen:</label>
        <select name="add" id="add">
            @forelse ($user->permissions as $permission)
                <option value={{ $permission->name }}>{{ $permission->name }}</option>
            @empty
                <option value=null>Keine Berechtigungen verfügbar</option>
            @endforelse
        </select>
        <label for="submit_add"></label>
        <button type="submit" value="submit">Berechtigung entfernen</button>
    </form>

    <form action="/permission/user" method="POST">
        @csrf
        @isset($permissions)

            <label for="del">Berechtigung auswählen:</label>
            <select name="del" id="del">

                @forelse ($permissions as $permission)
                    {{-- $permission, $user->permissions --}}
                    @if (!$user->permissions->contains('name', $permission->name))
                        <option value={{ $permission->name }}>{{ $permission->name }}</option>
                    @endif
                @empty
                    <option value=null>Keine Berechtigungen verfügbar</option>
                @endforelse
            </select>
            <label for="submit_del"></label>
            <button type="submit" value="submit">Berechtigung hinzufügen</button>
        @endisset
    </form>
@endisset

<form action="/permission/usre" method="POST">
    @csrf
    <button type="repair" value="repair">Standart Berechtigungen für Nutzer zurücksetzen</button>
</form>
@isset($users)
@endisset
