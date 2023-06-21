<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Sistema de Gestion de Cine </title>

         <!-- Bootstrap -->
         <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <!--css Personalizado-->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
       <!-- Fonts -->

       <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
      <!-- Menu de navegación -->
        <header>
        <div>
          @include('layouts.menunavigation')

          </div>
        </header>
      <!-- Fin menú navegación -->

     <!-- Inicio sección Ayuda -->
     <div class="row text-start" id="filaAyuda">
        <h2> Preguntas Frecuentes </h2>
      </div>

      <div class="accordion accordion-flush" id="accordionAyuda">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button text-bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              Pregunta 1
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3>La película que quiero ver no aparece en cartelera, ¿Por qué?</h3>
              <p><br>Independientemente de si la película ya fue estrenada o no, puede pedirnos mediante nuestra sección de contacto si desea que agreguemos la película a nuestra cartelera. </p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              Pregunta 2
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3>¿Como hacen para identificar que compre un boleto para la película en el sitio web, al momento de verla? </h3>
              <p><br>Para ver la película, necesitas mostrar el comprobante de la compra mediante una captura de pantalla o llevarlo impreso a la persona encargada de verificarlas.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              Pregunta 3
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3>¿Qué asiento tengo, después de haber comprado un boleto para la película que quería ver?</h3>
              <p><br>Nuestro sistema no tiene asignación de asientos, por lo que en el momento en el que entre a la sala para ver su película, usted puede sentarse en cualquier asiento disponible.</p>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
              Pregunta 4
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3>¿Dónde puedo comprar golosinas o gaseosas? </h3>
              <p><br>La compra de comestibles no se realiza en la página, debe hacerse de forma presencial en nuestro cine antes de ver la película. </p>
            </div>
          </div>
        </div>
      </div>

     <!-- Fin sección Ayuda -->

     <!-- Contenedor manual de usuario -->
     <div class="row text-center justify-content-center">
        <div class="col col-lg-4">
          <div class="container align-items-center border border-3 border-light border-opacity-25 rounded-top rounded-5" id="container-Manual-Usuario">
            <h3>
              Descarga el Manual de Usuario Aquí
            </h3>
            <a href="#" class="row align-items-center justify-content-center" download="Manual-Usuario"><img src="{{ asset('Imagenes/ICONOS/Icono pdf.png') }}" alt="Icono descarga Manual de usuario" id="Manual-Usuario" ></a>
          </div>
        </div>
     </div>
     <!-- Fin Contenedor manual de usuario -->


      <!-- inicio Footer -->
          @include('layouts.footer')
      <!-- Fin footer -->

        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>
