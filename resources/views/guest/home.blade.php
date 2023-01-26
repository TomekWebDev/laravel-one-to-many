{{-- @extends('layouts.app')

@section('content')
    <h1>Benvenuto guest</h1>
    <div>test della pagina guest, che vede chiunque senza loggarsi.</div>
    <div>questo testo è scritto dentro uno yeld che è generato da laravel e si trova in app.blade.php, dentro la cartella
        layouts nelle view, generata anche lei in automatico.</div>
    <div>tutto quello che va in questa pagina è dentro il tag main</div>
    <br>
    <div>qui è dove verrà implementato Vue</div>
@endsection --}}

<!doctype html>
<html lang="en">

<head>
    <title>Frony Office Vue</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    {{-- questa view viene dalla rotta in web.php ed è collegata a tutta la struttura di vue nella cartella js (vedi App.vue per istruzioni) --}}

    <div id="root">


    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
