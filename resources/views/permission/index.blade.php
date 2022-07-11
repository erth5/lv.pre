<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Debug: {{ Route::current()->getName() }}</title>
</head>

<body>
    <x-debug.style />
    <div style="float: left">
        <x-debug.menu />
        <x-permission.menu />
    </div>

    {{-- all --}}
    <x-permission.show :users=$users :permissions=$permissions />

    @if (str_ends_with(url()->current(), 'role'))
        <x-permission.role.edit :roles=$roles :permissions=$permissions :role=$role />
    @endif

    @if (str_ends_with(url()->current(), 'user'))
        <x-permission.user.edit :users=$users :permissions=$permissions :user=$user />
    @endif

    {{-- own --}}
    <x-permission.local.show :users=$users />
    <x-permission.local.edit :users=$users />

</body>

</html>
