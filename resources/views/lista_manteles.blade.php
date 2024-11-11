<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Lista Manteles</title>
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
            <h1>Manteles Registradas</h1>
            <br>
            <table id="tabla-mantel">
                <thead>
                    <tr>
                        <th>Imagen del mantel</th>
                        <th>Color del mantel</th>
                        <th>Tipo de mantel</th>
                        <th>Cantidad</th>
                        <th>Estado del mantel</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato_mantel as $mantel)
                    <tr>
                        <td><img src="{{ asset('storage/' . $mantel->imagen_manteles) }}" alt="" width="50"></td>
                        <td>{{$mantel->color_manteles}}</td>
                        <td>{{$mantel->tipo_manteles}}</td>
                        <td>{{$mantel->cant_manteles}}</td>
                        <td>{{$mantel->estatus_manteles == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <div>
                                <a href="{{route('mantel.editarmantel', ['pk_manteles' => $mantel->pk_manteles])}}">
                                    <i class="bi bi-pencil-square" title="Editar mantel"></i>
                                </a>
                                @if ($mantel->estatus_manteles == 1)
                                <a href="{{route('mantel.bajamanteles', ['pk_manteles' => $mantel->pk_manteles])}}" >
                                    <i class="bi bi-lock" title="Inactivar mantel"></i>
                                </a>
                                @else
                                <a href="{{route('mantel.activarmanteles', ['pk_manteles' => $mantel->pk_manteles])}}" >
                                    <i class="bi bi-unlock" title="Activar mantel"></i>
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
            $('#tabla-mantel').DataTable({
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