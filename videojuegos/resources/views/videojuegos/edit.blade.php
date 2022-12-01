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

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1>Modificar {{ $videojuego -> titulo }}</h1>
                <form method="POST" action="{{ route('videojuegos.update', ['videojuego' => $videojuego -> id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $videojuego -> titulo }}">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="{{ $videojuego -> precio }}">
                    </div>
                    <div class="mb-3">
                        <label for="pegi" class="form-label">Pegi</label>
                        <select class="form-select" name="pegi">
                            <option selected>Selecciona Pegi</option>
                            <option value="3">PEGI 3</option>
                            <option value="7">PEGI 7</option>
                            <option value="12">PEGI 12</option>
                            <option value="16">PEGI 16</option>
                            <option value="18">PEGI 18</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $videojuego -> descripcion }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a class="btn btn-light ml-3" type="submit" href="{{ route('videojuegos.index') }}">Volver</a>
                    
                </form>

            </div>
        </div>
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