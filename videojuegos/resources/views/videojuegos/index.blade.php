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
        <h1>{{ $mensaje }}</h1>
        <div class="row">
            <div class="col-9">
                <table class='table table-success table-striped table-hover'>
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Precio</th>
                            <th>pegi</th>
                            <th>Descripción</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($videojuegos as $videojuego) 
                            <tr>
                                <td> {{ $videojuego['titulo'] }} </td>
                                <td> {{ $videojuego['precio'] }}</td>
                                <td> {{ $videojuego['pegi']  }}</td>
                                <td> {{ $videojuego['descripcion'] }} </td>
                                <td>
                                    <form method="GET" action="{{ route('videojuegos.show',['videojuego' => $videojuego -> id]) }}">
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('videojuegos.destroy' , ['videojuego' => $videojuego -> id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET" action="{{ route('videojuegos.edit' , ['videojuego' => $videojuego -> id]) }}">
                                        <button class="btn btn-warning" type="submit" >Editar</button>
                                    </form>
                                    </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <a class="btn btn-info" href="{{ route('videojuegos.create') }}">Nuevo Videojuego</a>
                
            </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>