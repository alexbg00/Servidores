<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <style>
            #cabecera{
                background-color: #85C1E9;
            }
            .card{
                font-size: 20px
            }
        </style>
</head>

<body>
    <div class="container">
        <h1>Detalles</h1>
    <div class="card" style="width: 30rem;">
        <div class="card-header" id="cabecera">
            Titulo: {{ $videojuego -> titulo }}
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Precio: {{ $videojuego -> precio }}</li>
            <li class="list-group-item">Pegi: {{ $videojuego -> pegi }}</li>
            <li class="list-group-item">Descripción: {{ $videojuego -> descripcion }}</li>
        </ul>

            <form method="GET" action="{{ route('videojuegos.edit' , ['videojuego' => $videojuego -> id]) }}">
                @csrf
                <button class="btn btn-warning" type="submit" href={{ route('videojuegos.edit') }}>Editar</button>
            </form>

        
    </div>
    <a class="btn btn-light mt-4" href="{{ route('videojuegos.index') }}">Volver</a>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>