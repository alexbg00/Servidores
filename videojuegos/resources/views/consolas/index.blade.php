<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        @include('header')
        <h1>Index</h1>

    </br>
    <table class="table table-primary table-striped table-hover">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Año de lanzamiento</th>
            <th>Fabricante</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($consolas as $consola)
        <tr>
            <td>{{ $consola['nombre'] }}</td>
            <td>{{ $consola['año_de_salida'] }}</td>
            <td>{{ $consola['fabricante'] }}</td>
            <td>{{ $consola['descripcion']}}</td>
            <td>
                <form action="{{ route('consolas.show',['consola' => $consola -> id]) }}" method="GET">
                    <button class="btn btn-primary" type="submit">Ver</button>
                </form>
            </td>
            <td>
                <form action={{ route('consolas.destroy',['consola' => $consola -> id]) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
            </td>
        </tr>
    </tbody>
        @endforeach
    </table>
    <a href="{{ route('consolas.create') }}" class="btn btn-primary">Crear consola</a>
        
    </div>    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>