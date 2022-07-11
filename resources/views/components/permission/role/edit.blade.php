@isset($roles)
    <form action="/permission/role" method="POST">
        @csrf
        <label for="roles">Rolle auswählen</label>
        <select name="roles" id="roles">
            @forelse ($roles as $rol)
                <option @isset($role) {{ $role->name == $rol->name ? 'selected' : '' }} @endisset
                    value={{ $rol->name }}>{{ $rol->name }}
                </option>
            @empty
                <option value=null>no roles</option>
            @endforelse
        </select>
        <label for="submit_role">Bestätigen</label>
        <button type="submit" name="submit" value="submit">Wählen</button>
    </form>
@endisset

@isset($role)
    <form action="/permission/role" method="POST">
        @csrf
        <label for="add">Berechtigung auswählen:</label>
        <select name="add" id="add">
            @forelse ($role->permissions as $permission)
                <option value={{ $permission->name }}>{{ $permission->name }}</option>
            @empty
                <option value=null>Keine Berechtigungen verfügbar</option>
            @endforelse
        </select>
        <label for="submit_add"></label>
        <button type="submit" value="submit">Berechtigung entfernen</button>
    </form>

    <form action="/permission/role" method="POST">
        @csrf
        @isset($permissions)

            <label for="del">Berechtigung auswählen:</label>
            <select name="del" id="del">

                @forelse ($permissions as $permission)
                    {{-- $permission, $role->permissions --}}
                    @if (!$role->permissions->contains('name', $permission->name))
                        <option value={{ $permission->name }}>{{ $permission->name }}</option>
                    @endif
                @empty
                @endforelse
            </select>
            <label for="submit_del"></label>
            <button type="submit" value="submit">Berechtigung hinzufügen</button>
        @endisset
    </form>
@endisset

<form action="/permission" method="POST">
    @csrf
    <button type="repair" value="repair">Standart Berechtigungen für Nutzer zurücksetzen</button>
</form>
