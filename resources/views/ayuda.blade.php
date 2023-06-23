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
     <div class="row text-center" id="filaAyuda">
        <h2> Preguntas Frecuentes </h2>
      </div>

      <div class="accordion accordion-flush" id="accordionAyuda">
      
      <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button text-bg-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              ¿Como puedo ingresar en el sistema?
          </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3 class="fst-italic">Para ingresar en el sistema, es necesario registrarse (o loguearse, en caso de ya estar registrado en el sistema), esto se lleva a cabo clickeando el botón "Registrarse" ubicado en la parte superior derecha de la pantalla. Una vez allí, se te pedirá que introduzcas tu nombre, mail, y una contraseña. Finalizado esto, estarás dentro del sitio como usuario. 
                <br>En caso de ya estar registrado, basta con clickear en el botón "Ingresar" e introducir el Mail y contraseña vinculados a tu usuario.
              </h3>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
               Quiero ver las funciones disponibles para una película, como lo hago?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3 class="fst-italic">Para ver las funciones disponibles de una película, se debe estar logueado dentro del sistema. Una vez dentro, debemos clickear la opción "Comprar Entrada" de la película que hemos elegido; allí se nos mostrará un formulario con información de la misma: fechas de las funciones, horarios, salas, formatos(2D o 3D) y el precio de la entrada. </h3>
              
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button text-bg-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              Quiero comprar una entrada, como lo hago?
          </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3 class="fst-italic">Para comprar una entrada, se clickea el botón "Comprar Entrada" de la película elegida; luego, se selecciona la función conveniente y se pincha el botón "Continuar"; y finalmente, se elige el método de Pago: Abono o Canje por puntos.</h3>
            </div>
          </div>
        </div>

        

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              Donde puedo ver mis puntos acumulados?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3 class="fst-italic">Los puntos acumulados se pueden ver en el apartado "Historial de Compra", este se encontrará en el menú de navegación superior, una vez que nos logueemos en el sistema.</h3>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed text-bg-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
              No encuentro como resolver mi duda, que puedo hacer?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
            <div class="accordion-body">
              <h3 class="fst-italic">En caso de necesitar más ayuda, puedes descargar el manual de usuario <strong class="text-decoration-underline">aquí debajo</strong>, o dirigirte al apartado "Contacto" del menú de navegación y rellenar el formulario. Te responderemos a la brevedad.</h3>
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
            <a href="{{ asset('docs/manual_usuario.pdf') }}" class="row align-items-center justify-content-center" download="Manual-Usuario"><img src="{{ asset('Imagenes/ICONOS/Icono pdf.png') }}" alt="Icono descarga Manual de usuario" id="Manual-Usuario" ></a>
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