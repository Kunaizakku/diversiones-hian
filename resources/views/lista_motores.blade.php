<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Lista Motores</title>
</head>
<body class="body">


    @include('sidebar')

    
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
    
    <div class="body-container">
        <div class="table-container">
            <h1>Motores Registradas</h1>
            <br>
            <table id="tabla-motor">
                <thead>
                    <tr>
                        <th>Imagen del motor</th>
                        <th>Color del motor</th>
                        <th>Cantidad</th>
                        <th>Estado del motor</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato_motor as $motor)
                    <tr>
                        <td><img src="{{ asset('storage/' . $motor->imagen_motores) }}" alt="" width="50"></td>
                        <td>{{$motor->color_motores}}</td>
                        <td>{{$motor->cant_motores}}</td>
                        <td>{{$motor->estatus_motores == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <div> 
                                <a href="{{route('motor.editarmotor', ['pk_motores' => $motor->pk_motores])}}">
                                    <i class="bi bi-pencil-square" title="Editar motor"></i>
                                </a>
                                @if ($motor->estatus_motores == 1)
                                <a href="{{route('motor.bajamotores', ['pk_motores' => $motor->pk_motores])}}" >
                                    <i class="bi bi-lock" title="Inactivar motor"></i>
                                </a>
                                @else
                                <a href="{{route('motor.activarmotores', ['pk_motores' => $motor->pk_motores])}}" >
                                    <i class="bi bi-unlock" title="Activar motor"></i>
                                </a>
                                @endif
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
            $('#tabla-motor').DataTable({
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
                alert('¿Seguro que deseas eliminar esta silla?');
                // Aquí puedes agregar una acción para eliminar el registro
            }
        }
    </script>

    @include('fooder')