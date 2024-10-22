<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Manteles</title>
</head>
<body>

  @include('sidebar')
  
  <div class="body-container">
    <div class="table-container">
        <h1>Manteles Registrados</h1>
        <br>
        <table id="tabla-manteles">
            <thead>
                <tr>
                    <th>Imagen del Mantel</th>
                    <th>Color del Mantel</th>
                    <th>Tipo de Mantel</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Datos de ejemplo estáticos -->
                <tr>
                    <td><img src="ruta/a/imagen_mantel1.jpg" alt="Imagen del mantel" width="50"></td>
                    <td>Rojo</td>
                    <td>Cuadrado</td>
                    <td>10</td>
                    <td>
                        <div>
                            <a href="#">
                                <i class="bi bi-pencil-square" title="Editar mantel"></i>
                            </a>
                            <a href="#" onclick="confirmarBaja(event)">
                                <i class="bi bi-lock" title="Eliminar mantel"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><img src="ruta/a/imagen_mantel2.jpg" alt="Imagen del mantel" width="50"></td>
                    <td>Azul</td>
                    <td>Redondo</td>
                    <td>15</td>
                    <td>
                        <div>
                            <a href="#">
                                <i class="bi bi-pencil-square" title="Editar mantel"></i>
                            </a>
                            <a href="#" onclick="confirmarBaja(event)">
                                <i class="bi bi-lock" title="Eliminar mantel"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // DataTable para hacer la tabla interactiva
    $(document).ready(function () {
        $('#tabla-manteles').DataTable({
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
            alert('¿Seguro que deseas eliminar este mantel?');
            // Aquí puedes agregar una acción para eliminar el registro
        }
    }
</script>

  @include('fooder')

</body>
</html>
