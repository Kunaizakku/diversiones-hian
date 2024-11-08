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
                        <th>Fecha de Entrega</th>
                        <th>Dirección</th>
                        <th>Número de Celular</th>
                        <th>Costo de la Renta</th>
                        <th>Sillas</th>
                        <th>mesas</th>
                        <th>Brincolines</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                     @foreach ($dato_rentas as $renta)
                    <tr>
                        <td>{{$renta->fecha_entrega}}</td>
                        <td>{{$renta->direccion}}</td>
                        <td>{{$renta->celular}}</td>
                        <td>{{$renta->costo}}</td>
                        <td>{{$renta->forma_sillas}}</td>
                        <td>{{$renta->forma_mesas}}</td>
                        <td>{{$renta->nombre_brincolines}}</td>
                        <td>
                            <div>
                                <a href="{{ route('renta.editarrenta', [ 'pk_rentas' => $renta->pk_rentas]) }}">
                                    <i class="bi bi-pencil-square" title="Editar renta"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock" title="Eliminar renta"></i>
                                </a>
                                <a href="{{ route('renta.ver_renta', ['pk_rentas' => $renta->pk_rentas]) }}">
                                    <i class="bi bi-eye" title="Mostrar informacion derenta"></i>
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
