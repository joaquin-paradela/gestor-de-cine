<footer class="row align-items-center">
            <div class="col-lg-4">
            </div>

            <div class="col-lg-4 text-center justify-content-center">
              <div class="row justify-content-center">
              <img src="{{ asset('Imagenes/ICONOS/Logo cine footer.png') }}" alt="Logo footer" id="logoSecundario">
              </div>
              <p> Diseñado por <i>Gonzalez - Paradela -  Pastor</i></p>
          </div>

            <div class="col-lg-4">
             <ul id="listafooter">
              <li>
                <a  href="{{ url('/bienvenida') }}">Cartelera</a>
              </li>
              <li>
                <a  href="{{ url('/contacto') }}">Contacto</a>
              </li>
              <li>
                <a href="{{ url('/ayuda') }}">Ayuda</a>
              </li>
              <li>
                <a href="{{ url('/promociones') }}">Promociones</a>
              </li>
            </ul>
            </div>
          </footer>
