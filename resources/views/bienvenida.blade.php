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

      <!-- Carrusel -->
        <section class="row">
          <div class="col col-lg-12 ">
                <div id="carouselExampleAutoplaying" class="carousel" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('Imagenes/el padrino.jpg') }}" class="d-block w-100" alt="el padrino">
                      <div class="carousel-caption d-none d-md-block" id="epigrafe">
                        <h4>El Padrino</h4>
                        <p>"Una historia de favores que derivan en amistades selladas con la muerte"</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('Imagenes/forest gump.jpg') }}" class="d-block w-100" alt="forest gump">
                      <div class="carousel-caption d-none d-md-block" id="epigrafe">
                        <h4>Forrest Gump</h4>
                        <p>"Una inyección de inocencia, solidaridad y optimismo que sirve de vacuna contra la desorientación y el cinismo"</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('Imagenes/Scarface.jpg') }}" class="d-block w-100" alt="scarface">
                      <div class="carousel-caption d-none d-md-block" id="epigrafe">
                        <h4>Scarface</h4>
                        <p>"La película más sangrienta sobre gánsteres con un inspirado Al Pacino"</p>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>
        </section>
      <!-- Fin carrusel -->

      
      
      <!-- Seccion cartelera -->
      <div class="row text-start" id="filaCartelera">
        <h2> Cartelera </h2>
      </div>
      
      <div class="container text-center">   
        <section class="row" id="cartelera">
          <div class="col-lg-3 col-md-4 col-sm-10">
            <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/el padrino.jpg') }}" class="card-img-top" alt="el padrino">
                <div class="card-body">
                  <h5 class="card-title">El Padrino</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/scarface cartelera.jpg') }}" class="card-img-top" alt="el padrino">
                <div class="card-body">
                  <h5 class="card-title">Scarface</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/Forrest gump cartelera.jpg') }}" class="card-img-top" alt="el padrino">
                <div class="card-body">
                  <h5 class="card-title">Forrest Gump</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/fight club.jpg') }}" class="card-img-top" alt="fight club">
                <div class="card-body">
                  <h5 class="card-title">Fight Club</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/jurasic park.jpg') }}" class="card-img-top" alt="Jurassic Park">
                <div class="card-body">
                  <h5 class="card-title">Jurassic Park</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/perfecto asesino.jpg') }}" class="card-img-top" alt="perfecto asesino">
                <div class="card-body">
                  <h5 class="card-title">Perfecto Asesino</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/Terminator 2.jpg') }}" class="card-img-top" alt="terminator 2">
                <div class="card-body">
                  <h5 class="card-title">Terminator 2</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/Terminator.jpg') }}" class="card-img-top" alt="Terminator">
                <div class="card-body">
                  <h5 class="card-title">Terminator</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-10">
              <div class="card text-bg-dark text-center">
                <img src="{{ asset('Imagenes/rescatando ryan.jpg') }}" class="card-img-top" alt="rescatando al soldado ryan">
                <div class="card-body">
                  <h5 class="card-title">Saving Private Ryan</h5>
                  <a href="#" class="btn btn-primary">Comprar Entrada</a>
                </div>
              </div>
          </div>
        </section>
      </div>
      <!-- Fin seccion cartelera -->

      <!-- inicio Footer -->
      @include('layouts.footer')
      <!-- Fin footer -->
      <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>

