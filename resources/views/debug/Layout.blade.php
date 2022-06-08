<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Debug: {{ Route::current()->getName() }}</title>
</head>

<body>

    <x-debug.sessionStatus />
    <x-image.style />
    <x-debug.menu />
    @yield('c')

</body>

</html>
