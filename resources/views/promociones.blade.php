<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Sistema de Gestion de Cine </title>
      <!-- Bootstrap -->
      <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <!--css Personalizado-->
       <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
       <!-- Fonts -->

        <link href="{{ secure_asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>

    <body>
           <!-- Menu de navegación -->
           <header>
            
            <div>
            @include('layouts.menunavigation')
                
            </div>     
          </header>
        <!-- Fin menú navegación -->

    
      <div class="row text-center" id="FilaPromociones">
        <h2>
        Canjea tus puntos!   
       </h2>

      </div>
      <div class="row Separador"></div>
      <!-- Promociones -->
      <div class="row justify-content-center Promociones" >
          <div class="container col col-lg-8 border-top border-bottom border-3 border-start-0 border-end-0">
            <div class="row">
              <div class=" col col-lg-6">
                <h4 class="text-start"> Promoción Banco Provincia </h4>
                <p> Promoción valida hasta 31/05/2023. En la compra de entradas 3D, 50% de descuento al valor total.</p>
              </div>
              <div class="col col-lg-6">
              <img src="{{ secure_asset('Imagenes/Banco provincia.jpg') }}" alt="Banco Provincia" class="col col-lg-4" >
              </div>
            </div>
          </div>
      </div>

      <div class="row justify-content-center Promociones" >
        <div class="container col col-lg-8 border-top border-bottom border-3 border-start-0 border-end-0">
          <div class="row">
            <div class=" col col-lg-6">
              <h4 class="text-start"> Promoción Banco Galicia </h4>
              <p> Promoción valida hasta 31/05/2023. En la compra de entradas 4D, 40% de descuento al valor total.</p>
            </div>
            <div class="col col-lg-6">
            <img src="{{ secure_asset('Imagenes/galicia.jpg') }}" alt="Banco Galicia" class="col col-lg-4" >
            </div>
          </div>
        </div>
    </div>



      <!-- inicio Footer -->
        @include('layouts.footer')
      <!-- Fin footer -->
        
        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>