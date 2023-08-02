<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Cine - Checkout</title>
    <!-- Bootstrap -->
    <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Personalizado -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="{{ secure_asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
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

    <div class="row justify-content-center mt-5">
        <div class="col-6 fs-4">
           <div class="container border border-primary bg-dark rounded-2 text-center" id="datosCompra"> 
                <p class="mb-3 mt-4 fst-italic bg-dark">Fecha seleccionada: <strong class="bg-primary fw-bold rounded-2">{{ $fechaSeleccionada }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Hora seleccionada: <strong class="bg-primary fw-bold rounded-2">{{ $horaSeleccionada }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Cantidad de entradas: <strong class="bg-primary fw-bold rounded-2">{{ $cantidadEntradas }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Precio de entrada unitaria: <strong class="bg-primary fw-bold rounded-2">{{ $precioEntrada }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Precio total: <strong class="bg-primary fw-bold rounded-2">{{ $precioTotal }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Pelicula seleccionada : <strong class="bg-primary fw-bold rounded-2">{{ $funcionSeleccionada->pelicula->titulo }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Sala seleccionada : <strong class="bg-primary fw-bold rounded-2">{{ $funcionSeleccionada->sala->nombre }}</strong></p>
                <p class="mb-3 mt-2 fst-italic bg-dark">Puntos acumulados : <strong class="bg-primary fw-bold rounded-2">{{ Auth::user()->puntos_acumulados}}</strong></p>
            </div>
        </div>
    </div>

        <!-- Formulario de selección de forma de pago -->
    <div class="row justify-content-center">
        
            <form class="Formularios2 justify-content-center border border-primary rounded-2" id="formaPagoForm">
                <div class="form-group">
                    <label for="formaPago">Forma de Pago</label>
                    <select class="form-control mb-4" id="formaPago" name="formaPago" required>
                        <option  value="abonar">Abonar</option>
                        <option value="puntos">Utilizar puntos</option>
                    </select>
                </div>
            </form>
        


        <!-- Otros elementos de la vista checkout -->

        <!-- Formulario de compra con abono -->
        <form class="Formularios2 justify-content-center border border-primary rounded-2 mb-4" action="{{ route('store') }}" method="POST" id="abonarForm">
            @csrf
            <input type="hidden" id="fechaSeleccionada" name="fechaSeleccionada" value="{{ $fechaSeleccionada }}">
            <input type="hidden" id="horaSeleccionada" name="horaSeleccionada" value="{{ $horaSeleccionada }}">
            <input type="hidden" id="cantidadEntradas" name="cantidadEntradas" value="{{ $cantidadEntradas }}">
            <input type="hidden" id="precioTotal" name="precioTotal" value="{{ $precioTotal }}">
            <input type="hidden" id="funcionSeleccionada" name="funcionSeleccionada" value="{{ $funcionSeleccionada->id }}">
            <input type="hidden" id="precioUnitario" name="precioUnitario" value="{{ $precioEntrada }}">
            <input type="hidden" name="formaPago" value="abonar">

            <label for="pago" class="form-label">Abonar</label>
            <input type="text" class="form-control" id="pago" name="pago" placeholder="Ingrese el pago">

            <div class="text-center">
                <button type="submit" id="btnCompra" class="btn btn-primary bg-primary mt-3 mb-3 fs-5">Realizar compra</button>
            </div>
        </form>

    <!-- Formulario de compra con puntos -->
        <form class="row justify-content-center" action="{{ route('store') }}" method="POST" id="puntosForm" style="display: none;">
            @csrf
            <input type="hidden" id="fechaSeleccionada" name="fechaSeleccionada" value="{{ $fechaSeleccionada }}">
            <input type="hidden" id="horaSeleccionada" name="horaSeleccionada" value="{{ $horaSeleccionada }}">
            <input type="hidden" id="cantidadEntradas" name="cantidadEntradas" value="{{ $cantidadEntradas }}">
            <input type="hidden" id="precioTotal" name="precioTotal" value="{{ $precioTotal }}">
            <input type="hidden" id="funcionSeleccionada" name="funcionSeleccionada" value="{{ $funcionSeleccionada->id }}">
            <input type="hidden" id="precioUnitario" name="precioUnitario" value="{{ $precioEntrada }}">
            <input type="hidden" name="formaPago" value="puntos">

            <div class="text-center">
                <button type="submit" id="btnCompraPuntos" class="btn btn-primary bg-primary mt-4 mb-5 fs-5">Realizar compra con puntos</button>
            </div>
        </form>
    </div>
    <!-- Fin contenido de la página -->

    <!-- Inicio Footer -->
    @include('layouts.footer')
    <!-- Fin footer -->

    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>

    <script>

const formaPagoForm = document.getElementById('formaPagoForm');
const formaPagoSelect = document.getElementById('formaPago');
const puntosForm = document.getElementById('puntosForm');
const abonarForm = document.getElementById('abonarForm');

    formaPagoSelect.addEventListener('change', function(event) {
        if (formaPagoSelect.value === 'abonar') {
                abonarForm.style.display = 'block';
                puntosForm.style.display = 'none';
            } else if (formaPagoSelect.value === 'puntos') {
                abonarForm.style.display = 'none';
                puntosForm.style.display = 'block';
            } else {
                abonarForm.style.display = 'none';
                puntosForm.style.display = 'none';
            }
        });

    
    const pagoInput = document.getElementById('pago');
    const realizarCompraBtn = document.getElementById('btnCompra');
    const realizarCompraPuntosBtn = document.getElementById('btnCompraPuntos');
    const precioTotal = parseFloat("{{ $precioTotal }}");
    const puntosAcumulados = parseInt("{{ Auth::user()->puntos_acumulados }}");
    const cantidadEntradas = parseInt("{{ $cantidadEntradas }}");
    const puntosNecesarios = cantidadEntradas * 20;
   

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

        abonarForm.submit();
    });

    

    realizarCompraPuntosBtn.addEventListener('click', function(event) {
        event.preventDefault(); //detenemos el proceso

        if(puntosAcumulados < puntosNecesarios){
            alert('No tenes los puntos necesarios para comprar las entradas');
            return;
        }

        
            puntosForm.submit();
    });

</script>

</body>
</html>
