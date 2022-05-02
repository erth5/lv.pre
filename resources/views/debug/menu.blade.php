<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel_Debug</title>
</head>

<body>

    <style>
        /* unvisited link */
        a:link {
            color: black;
            font-size: 20px
        }

        /* visited link */
        a:visited {
            color: green;
        }

        /* mouse over link */
        a:hover {
            color: hotpink;
        }

        /* selected link - braucht eine "active" Steuerung*/
        a:active {
            color: blue;
        }

        .disabled {
            pointer-events: none
        }

    </style>

    <script></script>

    <!-- Menue bei allen Seiten anzeigen lassen -->
    <a href="debug">Übersicht</a>
    <a href="debug/debug">Weiterleitung doppelter Eintrag</a>
    <blockquote></blockquote>

    <a href="debug/db">DatenbankVerbindung</a>
    <a href="debug/php">PHP Info</a>

    <blockquote></blockquote>
    <a href="debug/template">template</a>
    <a href="debug/views">views</a>
    <a href="debug/controllers">controllers</a>

    <blockquote></blockquote>
    <a href="route-list">Ansicht Route-List</a>
    <a href="telescope">Telescope</a>
    <a class="disabled" href="">Swagger</a>






</body>

</html>
