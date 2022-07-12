<form action="/permission/user" method="POST">
    @csrf
    @isset($users)
        <fieldset>
            <label for="users">Nutzer auswählen</label>
            <select name="id" id="users">
                <option value=null>select one</option>
                @forelse ($users as $usr)
                    <option @isset($user) {{ $user->id == $usr->id ? 'selected' : '' }} @endisset
                        value={{ $usr->id }}>{{ $usr->name }}
                    </option>
                @empty
                @endforelse
            </select>
            <label for="submit_user">Bestätigen</label>
            <button type="submit" name="submit" value="submit">Wählen</button>
        </fieldset>
    @endisset

    @isset($user)
        <fieldset>
            <label for="del">Berechtigung auswählen:</label>
            <select name="del" id="del">
                <option value=null>Berechtigung auswählen:</option>
                @forelse ($user->permissions as $permission)
                    <option value={{ $permission->name }}>{{ $permission->name }}</option>
                @empty
                @endforelse
            </select>
            <label for="submit_del"></label>
            <button type="submit" value="submit">Berechtigung entfernen</button>
        </fieldset>

        @isset($permissions)
            <fieldset>
                <label for="add">Berechtigung auswählen:</label>
                <select name="add" id="add">
                    <option value=null>Berechtigung auswählen</option>
                    @forelse ($permissions as $permission)
                        {{-- $permission, $user->permissions --}}
                        @if (!$user->permissions->contains('name', $permission->name))
                            <option value={{ $permission->name }}>{{ $permission->name }}</option>
                        @endif
                    @empty
                    @endforelse
                </select>
                <label for="submit_add"></label>
                <button type="submit" value="submit">Berechtigung hinzufügen</button>
            </fieldset>
        @endisset
    @endisset
    <fieldset>
        <button type="repair" value="repair">Standart Berechtigungen für Nutzer zurücksetzen</button>
    </fieldset>
</form>
