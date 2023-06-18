<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Función</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Menú de navegación -->
    <header>
        <div>
            @include('layouts.menunavigation')
        </div>     
    </header>
    <!-- Fin menú navegación -->

    <!-- Contenido de la página -->

    <div class="row">
        <h1 class="titulos text-center">Editar Función</h1>
    </div>
    

         <div class="container MinimoAnchoAlto align-items-center">
    
            <div class="row justify-content-center align-items-center">
            <!-- Formulario de edición -->
                <form class="Formularios row justify-content-center border border-primary rounded-2" action="{{ route('admin.funciones.update', $funcion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campos del formulario -->
                    <div class="col-8">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ $funcion->fecha }}" required>
                    </div>
                    <div class="col-8">
                        <label for="hora_inicio">Hora de inicio</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" value="{{ $funcion->hora_inicio }}" required>
                    </div>
                    <div class="col-8">
                        <label for="precio_entrada">Precio de entrada</label>
                        <input type="number" id="precio_entrada" name="precio_entrada" class="form-control" value="{{ $funcion->precio_entrada }}" required>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="col-6 text-center">
                        <button type="submit" class="btn btn-primary Botones">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
