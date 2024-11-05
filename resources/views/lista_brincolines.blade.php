<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Brincolines Registradas</title>
</head>
<body class="body">

    @include('sidebar')
    
    <div class="body-container">
        <div class="table-container">
            <h1>Brincolines Registrados</h1>
            <br>
            <table id="tabla-brincolines">
                <thead>
                    <tr>
                        <th>Imagen del Brincolín</th>
                        <th>Nombre del Brincolín</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Tamaño</th>
                        <th>Estado de Brincolines</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    @foreach ($dato_brincolines as $brincolin)
                    <tr>
                        <td><img src="{{ asset('storage/' . $brincolin->imagen_brincolines) }}" alt="$brincolin->nombre_brincolines" width="50"></td>
                        <td>{{$brincolin->nombre_brincolines}}</td>
                        <td>{{$brincolin->cant_brincolines}}</td>
                        <td>{{$brincolin->cat_brincolines}}</td>
                        <td>{{$brincolin->tam_brincolines}}</td>
                        <td>{{ $brincolin->estatus_sillas == 1 ? 'Activo' : 'Inactivo' }}</td>
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
        // Inicializar la tabla con DataTable
        $(document).ready(function () {
            $('#tabla-brincolines').DataTable({
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
                const confirmacion = confirm('¿Seguro que deseas eliminar este brincolín?');
                if (confirmacion) {
                    // Acción para eliminar el registro
                }
            }
        }
    </script>

    
    @include('fooder')