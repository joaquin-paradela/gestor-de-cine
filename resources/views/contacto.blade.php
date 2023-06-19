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
       @include('layouts.menunavigation')
      <!-- Fin menú navegación -->
      @if(Session::has('mensaje_enviado'))
      <!-- <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje_enviado') }}
      </div> -->
      <div class="alert alert-success border border-3 border-success rounded-2 bg-subtle text-center fs-4 alert-dismissible fade show ms-1 me-1 mt-1" role="alert">
        <strong>{{ Session::get('mensaje_enviado') }}</strong>
        <button  class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- <div class="row text-center">
            <div class="alert alert-success fs-3 fw-semibold">
                {{ Session::get('mensaje_enviado') }}
            </div>
      </div> -->
      @endif
      <div class="row align-items-end justify-content-end" id="FondoContacto">
        <div class="col">
          <h2 class="efectoTexto">Contáctenos</h2>
          <p> Para sus consultas, envíenos un correo electrónico utilizando el siguiente formulario</p>
        </div>
      </div>



      <div class="row align-items-center justify-content-center" >
        <img src="{{ asset('Imagenes/ICONOS/icono-contacto.png') }}" alt="Logo" id="LogoContacto" >
      </div>

      
      
    <div class="row justify-content-center align-items-center" >  
       
        <!-- Formulario Contacto -->
        <form  method="POST" action="{{route('consulta_enviada')}}" class="container border-2 border-start border-end" id="FormularioContacto">
          @csrf
          <div class="row mb-3 text-center justify-content-center ">
            <label for="exampleFormControlInput1" class="form-label border border-3 rounded-bottom">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@email.com">
          </div>
          <div class="row mb-3 text-center justify-content-center">
            <label for="exampleFormControlTextarea1" class="form-label border border-3 rounded-bottom">Asunto</label>
            <textarea class="form-control" name="asunto" id="exampleFormControlTextarea1" rows="1" placeholder="Escribe el asunto aquí"></textarea>
          </div>
          <div class="row mb-3 text-center justify-content-center">
            <label for="exampleFormControlTextarea1" class="form-label border border-3 rounded-bottom">Consulta</label>
            <textarea class="form-control" name="consulta" id="consulta" rows="3" placeholder="Escribe tu consulta aquí"></textarea>
          </div>
          <div class="row mb-3 text-center justify-content-center">
            <input type="submit" class="btn btn-success bg-success" id="exampleFormControlInput1">
          </div>
      </div>

    </div>
      <!-- Fin Formulario Contacto -->

      <div class="Separador"></div>

    <div class="row align-items-center border-2 border-top border-bottom" id="FilaMapa">
        <div class="col col-lg-6 justify-content-around align-items-center">
          <div class="row align-items-center">
            <div class="col col-lg-8 text-end">
              <h4> Nuestra Sucursal</h4>
            </div> 
            <div class="col col-lg-4 justify-content-center">
              <img src="{{ asset('Imagenes/ICONOS/mapa.png') }}" alt="mapa" id="Mapa" >
            </div> 
          </div>
        </div>
        <div class="col col-lg-6 align-items-center justify-content-start">
        <iframe class="border-3 rounded-bottom-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.5591441865295!2d-58.60460592343556!3d-34.640579459447174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc951c0fe2d9f5%3A0x9f1c540898efecbe!2sUTN%20-%20Facultad%20Regional%20Haedo!5e0!3m2!1ses!2sar!4v1685314182348!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    

      <!-- inicio Footer -->
      @include('layouts.footer')
  <!-- Fin footer -->
    
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>