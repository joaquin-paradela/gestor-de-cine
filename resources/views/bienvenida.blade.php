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

      <!-- Carrusel dinamico -->
    <div class="row">
        <div class="col">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($peliculas as $pelicula)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" class="img-fluid" alt="{{ $pelicula->titulo }}">
                        <div class="carousel-caption d-none d-md-block" id="epigrafe">
                            <h4>{{ $pelicula->titulo }}</h4>
                            <p>"{{ $pelicula->descripcion }}"</p>
                        </div>
                    </div>
                    @endforeach
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
    </div>
    <!-- Fin carrusel -->

   

    
      <!-- Seccion cartelera DINAMICA -->
      <div class="row text-start" id="filaCartelera">
        <h2>Cartelera</h2>
       </div>

    <div class="container text-center">   
        <section class="row" id="cartelera">
            @foreach ($peliculas as $pelicula)
            <div class="col-lg-3 col-md-4 col-sm-10">
                <div class="card text-bg-dark text-center">
                    <img src="{{ asset('Imagenes/' . $pelicula->imagen) }}" class="card-img-top" alt="{{ $pelicula->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pelicula->titulo }}</h5>
                        <a href="{{ route('boleteria', ['peliculaId' => $pelicula->id]) }}" class="btn btn-primary">Comprar Entrada</a>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
    <!-- Fin seccion cartelera -->
      <!-- Fin seccion cartelera -->

      <!-- inicio Footer -->
      @include('layouts.footer')
      <!-- Fin footer -->
      <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>

