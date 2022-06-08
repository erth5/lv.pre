<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Debug: {{ Route::current()->getName() }}</title>
</head>

<body>

    @if (session('status'))
        {{ session('status') }}
    @endif
    @if (session('statusInfo'))
        {{ session('statusInfo') }}
    @endif

    <x-debug.menu />
    @yield('c')

</body>

</html>
