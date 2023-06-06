<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Checkout</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
    <div class="container">
        <h1>Checkout</h1>

        <p>Fecha seleccionada: {{ $fechaSeleccionada }}</p>
        <p>Hora seleccionada: {{ $horaSeleccionada }}</p>
        <p>Cantidad de entradas: {{ $cantidadEntradas }}</p>
        <p>Precio de entrada unitaria: {{ $precioEntrada }}</p>
        <p>Precio total: {{ $precioTotal }}</p>
        <p>Pelicula seleccionada : {{ $funcionSeleccionada->pelicula->titulo }}</p>
        <p>Sala seleccionada : {{ $funcionSeleccionada->sala->nombre }}</p>


        <!-- Otros elementos de la vista checkout -->

        <!-- Formulario de compra -->
        <form action="{{ route('store') }}" method="POST" id="formularioCompra">
            @csrf
            <input type="hidden" id="fechaSeleccionada" name="fechaSeleccionada" value="{{ $fechaSeleccionada }}">
            <input type="hidden" id="horaSeleccionada" name="horaSeleccionada" value="{{ $horaSeleccionada }}">
            <input type="hidden" id="cantidadEntradas" name="cantidadEntradas" value="{{ $cantidadEntradas }}">
            <input type="hidden" id="precioTotal" name="precioTotal" value="{{ $precioTotal }}">
            <input type="hidden" id="funcionSeleccionada" name="funcionSeleccionada" value="{{ $funcionSeleccionada->id }}">
            <input type="hidden" id="precioUnitario" name="precioUnitario" value="{{ $precioEntrada }}">


           
            <label for="pago" class="form-label">Abonar</label>
            <input type="text" class="form-control" id="pago" name="pago" placeholder="Ingrese el pago">
             

            <div class="text-center">
                <button type="submit" id="btnCompra" class="btn btn-primary">Realizar compra</button>
            </div>
        </form>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <script>
    const formularioCompra = document.getElementById('formularioCompra');
    const pagoInput = document.getElementById('pago');
    const realizarCompraBtn = document.getElementById('btnCompra');
    const precioTotal = parseFloat("{{ $precioTotal }}");

    realizarCompraBtn.addEventListener('click', function(event) {
        event.preventDefault(); //detenemos el proceso

        const pago = parseFloat(pagoInput.value);

        if (isNaN(pago)) {
            alert('Solo se aceptan números en el campo de pago.');
            return;
        } else if (pago < precioTotal) {
            alert('El pago debe ser igual al precio total, está intentando ingresar un monto menor.');
            return;
        } else if (pago > precioTotal) {
            alert('El pago debe ser igual al precio total, está intentando ingresar un monto mayor.');
            return;
        }


        

        formularioCompra.submit();
    });
</script>

</body>
</html>
