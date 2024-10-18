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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    <tr>
                        <td><img src="ruta/a/imagen_silla1.jpg" alt="Imagen de la silla" width="50"></td>
                        <td>Redonda</td>
                        <td>10</td>
                        <td>Adultos</td>
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
                    <tr>
                        <td><img src="ruta/a/imagen_silla2.jpg" alt="Imagen de la silla" width="50"></td>
                        <td>Cuadrada</td>
                        <td>15</td>
                        <td>Niños</td>
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