    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="ruta/a/tu/imagen.ico" rel="icon">
        <title>Empleados registrados</title>

        <link rel="manifest" href="{{ asset('/manifest.json') }}">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    </head>

        @include('sidebar')
        @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
        <body class="body">

        
            <div class="body-container">
                <div class="table-container">
                    <h1>Empleados registrados</h1>
                    <br>
                    <table id="tabla-empleados">
                        <thead>
                            <tr>
                                <th>Nombre del empleado</th>
                                <th>Usuario</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td data-label="Nombre del empleado">{{ $user->nombre }}</td>
                                    <td data-label="Usuario">{{ $user->usuario }}</td>
                                    <td data-label="Estatus">
                                        @if ($user->estatus_usuario == 1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </td>
                                    <td data-label="Acciones">
                                        <div class="acciones-iconos">
                                            <div>
                                                <a href="#">
                                                    <i class="bi bi-pencil-square editar" title="Editar datos"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <i class="bi bi-key ver" title="Cambiar contraseña"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" onclick="confirmarBaja(event)">
                                                    <i class="bi bi-lock eliminar" title="Dar baja"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <script>
            $(document).ready(function () {
                $('#tabla-empleados').DataTable({
                    "language": {
                        "search": "Buscar:",
                        "info": "Mostrando START a END de TOTAL registros",
                        "zeroRecords": "Sin resultados",
                        "lengthMenu": "Mostrar MENU registros por página",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            });

            function confirmarBaja(event) {
                event.preventDefault();

                const link = event.target.closest('a');

                if (link) {
                    Swal.fire({
                        title: '¿Seguro?',
                        text: '¿Deseas dar de baja a este empleado?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, dar de baja',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link.href;
                        }
                    });
                }
            }
        </script>

    @include('fooder')
