<nav class="navbar navbar-default">
  <div class="container-fluid c1">
    <div class="row">
      <div class="col-sm-4 col1">
        <center>
          <img src="{{asset('imagenes/bloques.png')}}" alt="Cabecera-carcer-infantil">
          <img src="{{asset('imagenes/bloques1.png')}}" alt="Cabecera-carcer-infantil">
        </center>
      </div>
      <div class="col-sm-4 col2">
        <center>
          <h1>Ayudando Manos Vacías</h1>
          <p>Porque los niños no pueden luchar contra el cáncer solos</p>
        </center>
      </div>
      <div class="col-sm-4 col3"> 
        <center>
          <img src="{{asset('imagenes/rompecabezas.png')}}" alt="Cabecera-carcer-infantil">
          <img src="{{asset('imagenes/robot.png')}}" alt="Cabecera-carcer-infantil">
        </center>
      </div>
    </div>
  </div>
  <div class="container-fluid c2">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <p><img src="{{asset('imagenes/cinta.png')}}" alt="Logo-carcer-infantil">
        AMV</p>
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown {{ Request::is('admin/tipo-cancer*') ? 'active' : null }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo de Cáncer <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('/admin/tipo-cancer/agregar') }}" >Agregar</a></li>
          <li><a href="{{ url('/admin/tipo-cancer/listar') }}">Listar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contacto <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Agregar</a></li>
          <li><a href="#">Listar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donaciones <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Agregar</a></li>
          <li><a href="#">Listar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
@include('auth.login')
