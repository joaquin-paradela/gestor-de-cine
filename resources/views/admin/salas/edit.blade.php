<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Fin menú navegación -->
    <!-- Contenido de la página -->

        <div class="row">
            <h1 class="titulos text-center">Editar Sala</h1>
        </div>
    <div class="container MinimoAnchoAlto">
        <div class="row justify-content-center">
            <!-- Formulario para editar una sala -->
            <form action="{{ route('admin.salas.update', $sala->id) }}" class="Formularios row justify-content-center border border-primary rounded-2 " method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre de la sala -->
                <div class="col-8">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sala->nombre }}" required>
                </div>

                <!-- Tipo de sala -->
                <div class="col-8">
                    <label for="tipo_sala">Tipo de Sala:</label>
                    <select class="form-control" id="tipo_sala" name="tipo_sala" required>
                        <option value="2D" @if ($sala->tipo_sala === '2D') selected @endif>2D</option>
                        <option value="3D" @if ($sala->tipo_sala === '3D') selected @endif>3D</option>
                    </select>
                </div>

                <!-- Capacidad de asientos -->
                <div class="col-8">
                    <label for="capacidad_asientos">Capacidad de Asientos:</label>
                    <input type="number" class="form-control" id="capacidad_asientos" name="capacidad_asientos" value="{{ $sala->capacidad_asientos }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary Botones">Actualizar Sala</button>
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
