<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Mesas Registradas</title>
</head>
<body class="body">

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
    
    <div class="body-container">
        <div class="table-container">
            <h1>Mesas Registradas</h1>
            <br>
            <table id="tabla-mesas">
                <thead>
                    <tr>
                        <th>Imagen de la Mesa</th>
                        <th>Forma de la Mesa</th>
                        <th>Cantidad</th>
                        <th>Audiencia Dirigida</th>
                        <th>Estado de Mesas</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato_mesas as $mesa)
                    <tr>
                        <td data-label="Imagen de la Mesa"><img src="{{ asset('storage/' . $mesa->imagen_mesas) }}" alt="{{$mesa->forma_mesas}}" width="50"></td>
                        <td data-label="Forma de la Mesa">{{$mesa->forma_mesas}}</td>
                        <td data-label="Cantidad">{{$mesa->cant_mesas}}</td>
                        <td data-label="Audiencia Dirigida">{{$mesa->audiencia_mesas}}</td>
                        <td data-label="Estado de Mesas">{{ $mesa->estatus_mesas == 1 ? 'Activas' : 'Inactivas' }}</td>
                        <td data-label="Opciones">
                            <div class="acciones-iconos">
                                <a href="{{ route('mesa.editarmesa', ['pk_mesas' => $mesa->pk_mesas]) }}">
                                    <i class="bi bi-pencil-square editar" title="Editar silla"></i>
                                </a>
                                @if ($mesa->estatus_mesas == 1)
                                <a href="{{route('mesa.bajamesas', ['pk_mesas' => $mesa->pk_mesas])}}" >
                                    <i class="bi bi-lock" title="Inactivar motor"></i>
                                </a>
                                @else
                                <a href="{{route('mesa.activarmesas', ['pk_mesas' => $mesa->pk_mesas])}}" >
                                    <i class="bi bi-unlock" title="Activar motor"></i>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock eliminar" title="Eliminar silla"></i>
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
        // Inicializar la tabla con DataTable
        $(document).ready(function () {
            $('#tabla-mesas').DataTable({
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "zeroRecords": "Sin resultados",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
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
                const confirmacion = confirm('¿Seguro que deseas eliminar esta mesa?');
                if (confirmacion) {
                    // Acción para eliminar el registro
                }
            }
        }
    </script>

    @include('fooder')

</body>
</html>
