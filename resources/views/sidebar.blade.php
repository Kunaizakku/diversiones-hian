<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Iconos --}}
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}">
    <script src="https://kit.fontawesome.com/69e6d6a4a5.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}?v=1">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hian</title>
</head>
<body>

  

  {{-- @php
    $PK_USUARIO = session('pk_usuario');
    $tipo_usuario = session('nombre_tipo_usuario');
  @endphp --}}

  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">Diversiones Hian</div>
      </div>
      <i class='bx bx-menu' id="btn"></i>
    </div>

    <ul class="nav_list">

      <li>
        <a href="{{ url('/') }}">
          <i class='bx bxs-home'></i>
          <span class="links_name">Inicio</span>
        </a>
        <span class="tooltip">Inicio</span>
      </li>
      {{-- <li>
        <a href="">
          <i class='bx bx-user-circle'></i>
        <span class="links_name">Perfil</span>
        </a>
        <span class="tooltip">Perfil</span>
      </li> --}}

      {{-- @if ($PK_USUARIO) --}}
      {{-- @else --}}
    @if (session('estatus')==1)
    @else
      <li>
        <a href="{{ route('iniciarsesion') }}">
            <i class='bx bx-user-plus'></i>
          <span class="links_name">Inicio de sesión</span>
        </a>
        <span class="tooltip">Sesión</span>
      </li>
    @endif
      <li>
        <a href="{{ route('form_sillas') }}">
            <i class='bx bx-user-plus'></i>
          <span class="links_name">Form sillas</span>
        </a>
        <span class="tooltip">Sillas</span>
      </li>
      <li>
        <a href="{{ route('form_mesas') }}">
            <i class='bx bx-user-plus'></i>
          <span class="links_name">Form mesas</span>
        </a>
        <span class="tooltip">Mesas</span>
      </li>
      <li>
        <a href="{{ route('form_brincolines') }}">
            <i class='bx bx-user-plus'></i>
          <span class="links_name">Form brincolines</span>
        </a>
        <span class="tooltip">Brincolines</span>
      </li>
    {{-- @endif 
    {{-- @endif --}}
    @if (session('estatus')==1)
        <li>
          <a href="{{ route('logout') }}">
            <i class='bx bx-user-minus'></i>
            <span class="links_name">Cerrar sesión</span>
          </a>
          <span class="tooltip">Sesión</span>
        </li>
    @endif

    </ul>
  </div>

  <div class="home_content">
    <div class="text">
      <div class="content_main">