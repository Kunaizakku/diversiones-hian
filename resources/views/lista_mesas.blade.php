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
                    <!-- Datos de ejemplo estáticos -->
                    @foreach ($dato_mesas as $mesa)
                    <tr>
                        <td><img src="{{ asset('storage/' . $mesa->imagen_mesas) }}" alt="$mesa->forma_mesas" width="50"></td>
                        <td>{{$mesa->forma_mesas}}</td>
                        <td>{{$mesa->cant_mesas}}</td>
                        <td>{{$mesa->audiencia_mesas}}</td>
                        <td>{{ $mesa->estatus_mesas == 1 ? 'Activas' : 'Inactivas' }}</td>
                        <td>
                            <div>
                                <a href="{{ route('mesa.editarmesa', ['pk_mesas' => $mesa->pk_mesas]) }}">
                                    <i class="bi bi-pencil-square" title="Editar silla"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar silla"></i>
                                </a>
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