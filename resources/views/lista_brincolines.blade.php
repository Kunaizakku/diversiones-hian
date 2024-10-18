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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    <tr>
                        <td><img src="ruta/a/imagen_brincolin1.jpg" alt="Imagen del brincolín" width="50"></td>
                        <td>Brincolín Acuático</td>
                        <td>5</td>
                        <td>Acuático</td>
                        <td>Grande</td>
                        <td>
                            <div>
                                <a href="#">
                                    <i class="bi bi-pencil-square" title="Editar brincolín"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar brincolín"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="ruta/a/imagen_brincolin2.jpg" alt="Imagen del brincolín" width="50"></td>
                        <td>Brincolín Seco</td>
                        <td>8</td>
                        <td>Seco</td>
                        <td>Mediano</td>
                        <td>
                            <div>
                                <a href="#">
                                    <i class="bi bi-pencil-square" title="Editar brincolín"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar brincolín"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
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