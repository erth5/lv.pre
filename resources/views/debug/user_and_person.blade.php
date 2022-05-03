<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>
        @foreach ($users as $user)
            {{ $user->name }}
            {{ $user->email }}
            {{$user->person->surname}}
            <blockquote></blockquote>
        @endforeach
    </h3>
</body>

</html>
