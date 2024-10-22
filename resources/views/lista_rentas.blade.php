<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Rentas Registradas</title>
</head>
<body class="body">

    @include('sidebar')
    
    <div class="body-container">
        <div class="table-container">
            <h1>Rentas Registradas</h1>
            <br>
            <table id="tabla-rentas">
                <thead>
                    <tr>
                        <th>Dirección</th>
                        <th>Fecha de Entrega</th>
                        <th>Número de Celular</th>
                        <th>Costo de la Renta</th>
                        <th>Elementos de Renta</th>
                        <th>Cantidad de Sillas</th>
                        <th>Cantidad de Mesas</th>
                        <th>Cantidad de Manteles</th>
                        <th>Cantidad de Brincolines</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    <tr>
                        <td>Calle Ejemplo 123</td>
                        <td>2024-10-20 14:00</td>
                        <td>1234567890</td>
                        <td>$500.00</td>
                        <td>Sillas, Mesas</td>
                        <td>10</td>
                        <td>5</td>
                        <td>2</td>
                        <td>1</td>
                        <td>
                            <div>
                                <a href="#">
                                    <i class="bi bi-pencil-square" title="Editar renta"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar renta"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Avenida Ejemplo 456</td>
                        <td>2024-10-22 09:00</td>
                        <td>0987654321</td>
                        <td>$300.00</td>
                        <td>Brincolines</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>3</td>
                        <td>
                            <div>
                                <a href="#">
                                    <i class="bi bi-pencil-square" title="Editar renta"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar renta"></i>
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
            $('#tabla-rentas').DataTable({
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
                const confirmacion = confirm('¿Seguro que deseas eliminar esta renta?');
                if (confirmacion) {
                    // Acción para eliminar el registro
                }
            }
        }
    </script>

    @include('fooder')

</body>
</html>
