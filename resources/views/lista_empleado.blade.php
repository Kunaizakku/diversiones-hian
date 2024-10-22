<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Empleados registrados</title>
</head>
<body class="body">

    @include('sidebar')
    
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí irían los datos de los empleados de forma estática o añadidos con JS -->
                    @foreach ($usuarios as $user)
                        <tr>
                            <td> {{ $user->nombre }} </td>
                            <td> {{ $user->usuario }} </td>
                            <td> 
                                @if ($user->estatus_usuario == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif 
                            </td>
                            <td>
                                <div>
                                    <div>
                                        <a href="#">
                                            <i class="bi bi-pencil-square" title="Editar datos"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <i class="bi bi-key" title="Cambiar contraseña"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" onclick="confirmarBaja(event)">
                                            <i class="bi bi-lock" title="Dar baja"></i>
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
        // Tabla con DataTable
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
