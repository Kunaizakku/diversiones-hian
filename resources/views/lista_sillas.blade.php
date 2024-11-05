<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Sillas Registradas</title>
</head>
<body class="body">

    @include('sidebar')
    
    <div class="body-container">
        <div class="table-container">
            <h1>Sillas Registradas</h1>
            <br>
            <table id="tabla-sillas">
                <thead>
                    <tr>
                        <th>Imagen de la Silla</th>
                        <th>Forma de la Silla</th>
                        <th>Cantidad</th>
                        <th>Audiencia Dirigida</th>
                        <th>Estado de Sillas</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                     @foreach ($dato_sillas as $silla)
                    <tr>
                        <td><img src="{{ asset('storage/' . $silla->imagen_sillas) }}" alt="$silla->forma_sillas" width="50"></td>
                        <td>{{$silla->forma_sillas}}</td>
                        <td>{{$silla->cant_sillas}}</td>
                        <td>{{$silla->audiencia_sillas}}</td>
                        <td>{{ $silla->estatus_sillas == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <div>
                                <a href="#">
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
        // Tabla con DataTable
        $(document).ready(function () {
            $('#tabla-sillas').DataTable({
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