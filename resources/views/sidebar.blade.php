
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/calendario.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}?v=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/69e6d6a4a5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Hian</title>
</head>

<body>

@if(session('id'))
        
        
        @else
            <script>
                window.location.href="{{url('/')}}";
            </script>
@endif

    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">Diversiones Hian</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="{{ url('/inicio') }}">
                    <i class='bi bi-house'></i>
                    <span class="links_name">Inicio</span>
                </a>
                <span class="tooltip">Inicio</span>
            </li>

            @if (session('estatus') == 1)
            @else
            <li>
                <a href="{{ route('iniciarsesion') }}">
                    <i class='bi bi-person-plus'></i>
                    <span class="links_name">Inicio de sesión</span>
                </a>
                <span class="tooltip">Sesión</span>
            </li>
            @endif

            <!-- Dropdown Formularios -->
            <div class="bootstrap-dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFormularios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bi bi-file-earmark-text'></i>
                        <span class="links_name">Formularios</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownFormularios">
                        <li><a class="dropdown-item" href="{{ route('form_sillas') }}">Form sillas</a></li>
                        <li><a class="dropdown-item" href="{{ route('form_mesas') }}">Form mesas</a></li>
                        <li><a class="dropdown-item" href="{{ route('form_brincolines') }}">Form brincolines</a></li>
                        <li><a class="dropdown-item" href="{{ route('form_extenciones') }}">Form Extensiones</a></li>
                        <li><a class="dropdown-item" href="{{ route('form_manteles') }}">Form Manteles</a></li>
                        <li><a class="dropdown-item" href="{{ route('form_rentas') }}">Form Rentas</a></li>
                    </ul>
                </li>
            </div>

            <!-- Dropdown Listas -->
            <div class="bootstrap-dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownListas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bi bi-list-ul'></i>
                        <span class="links_name">Listas</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownListas">
                        <li><a class="dropdown-item" href="{{ route('lista_sillas') }}">Lista Silla</a></li>
                        <li><a class="dropdown-item" href="{{ route('lista_mesas') }}">Lista Mesas</a></li>
                        <li><a class="dropdown-item" href="{{ route('lista_brincolines') }}">Lista Brincolines</a></li>
                        <li><a class="dropdown-item" href="{{ route('lista_extenciones') }}">Lista Extensiones</a></li>
                        <li><a class="dropdown-item" href="{{ route('lista_manteles') }}">Lista Manteles</a></li>
                        <li><a class="dropdown-item" href="{{ route('lista_rentas') }}">Lista Rentas</a></li>
                    </ul>
                </li>
            </div>

            <!-- Dropdown Usuarios -->
            <div class="bootstrap-dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bi bi-person'></i>
                        <span class="links_name">Usuarios</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                        <li><a class="dropdown-item" href="{{ route('registro') }}">Form Usuario</a></li>
                        <li><a class="dropdown-item" href="{{ route('detalle_usuario') }}">Lista Usuario</a></li>
                    </ul>
                </li>
            </div>

            <div class="content-below-dropdown">
                @if (session('estatus') == 1)
                <li>
                    <a href="{{ route('logout') }}">
                        <i class='bi bi-box-arrow-right'></i>
                        <span class="links_name">Cerrar sesión</span>
                    </a>
                    <span class="tooltip">Sesión</span>
                </li>
                @endif
            </div>
        </ul>
    </div>

    <div class="home_content">
        <div class="text">
            <div class="content_main">

                <script>
                    $(document).ready(function () {
                        let dropdownOpen = false; // Variable para rastrear el estado del dropdown

                        // Manejar clic en el enlace del dropdown
                        $('.nav-link.dropdown-toggle').on('click', function (e) {
                            e.preventDefault(); // Evitar la acción por defecto
                            dropdownOpen = !dropdownOpen; // Cambiar el estado

                            const dropdownMenu = $(this).siblings('.dropdown-menu');

                            // Añadir o quitar clase activa
                            if (dropdownOpen) {
                                dropdownMenu.addClass('show');
                                $(this).addClass('active-dropdown-toggle'); // Añadir clase activa
                            } else {
                                dropdownMenu.removeClass('show');
                                $(this).removeClass('active-dropdown-toggle'); // Quitar clase activa
                            }
                        });

                        // Manejar el evento mouseleave para cerrar el dropdown
                        $('.bootstrap-dropdown').on('mouseleave', function () {
                            $(this).find('.dropdown-menu').removeClass('show');
                            $(this).find('.nav-link.dropdown-toggle').removeClass('active-dropdown-toggle'); // Quitar clase activa
                            dropdownOpen = false; // Resetear estado
                        });
                    });
                </script>
