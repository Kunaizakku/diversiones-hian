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
            <h1>Informacion de Renta</h1>
            <br>
            <table id="tabla-rentas">
                <thead>
                    <tr>
                        <th>Dirección</th>
                        <th>Fecha de Entrega</th>
                        <th>Número de Celular</th>
                        <th>Costo de la Renta</th>
                        <th>Tipo silla</th>
                        <th>Cantidad de Sillas</th>
                        <th>Audiencia de Sillas</th>
                        <th>Tipo de Mesa</th>
                        <th>Cantidad de Mesas</th>
                        <th>Audiencia de Mesas</th>
                        <th>Tipo de Manteles</th>
                        <th>Cantidad de Manteles</th>
                        <th>Brincolin Rentado</th>
                        <th>Motor Rentado</th>
                        <th>Extención Rentada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    <tr>
                        <td>{{ $dato_renta-> direccion }}</td>
                        <td>{{ $dato_renta-> fecha_entrega}}</td>
                        <td>{{ $dato_renta-> celular}}</td>
                        <td>{{ $dato_renta-> costo}}</td>
                        <td>{{ $dato_renta-> forma_sillas}}</td>
                        <td>{{ $dato_renta-> cant_sillas_renta ?? 'sin cantidad de sillas'}}</td>
                        <td>{{ $dato_renta-> audiencia_sillas_renta ?? 'sin audiencia de sillas'}}</td>
                        <td>{{ $dato_renta-> forma_mesas}}</td>
                        <td>{{ $dato_renta-> cant_mesas_renta ?? 'sin cantidad de mesas'}}</td>
                        <td>{{ $dato_renta-> audiencia_mesas_renta ?? 'sin audiencia de mesas'}}</td>
                        <td>{{ $dato_renta-> tipo_manteles_renta}}</td>
                        <td>{{ $dato_renta-> cant_manteles_renta ?? 'sin cantidad de manteles'}}</td>
                        <td>{{ $dato_renta-> nombre_brincolines}}</td>
                        <td>{{ $dato_renta-> color_motores}}</td>
                        <td>{{ $dato_renta-> nombre_extenciones}}</td>
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
