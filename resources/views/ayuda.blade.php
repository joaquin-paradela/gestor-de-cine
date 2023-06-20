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
              <h3> Titulo de la Pregunta </h3>
              <p>Cuerpo de la pregunta</p>
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
              <h3> Titulo de la Pregunta </h3>
              <p>Cuerpo de la pregunta</p>
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
              <h3> Titulo de la Pregunta </h3>
              <p>Cuerpo de la pregunta</p>
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
              <h3> Titulo de la Pregunta </h3>
              <p>Cuerpo de la pregunta</p>
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