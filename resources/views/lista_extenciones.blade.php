<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Extenciones Registradas</title>
</head>
<body class="body">

    @include('sidebar')
    
    <div class="body-container">
        <div class="table-container">
            <h1>Extensiones Registradas</h1>
            <br>
            <table id="tabla-extensiones">
                <thead>
                    <tr>
                        <th>Imagen de la Extensión</th>
                        <th>Nombre de la Extensión</th>
                        <th>Cantidad</th>
                        <th>Estado de Extenciones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    @foreach ($dato_extensiones as $extencion)
                    <tr>
                        <td><img src="{{ asset('storage/' . $extencion->imagen_extenciones) }}" alt="$extencion->nombre_extenciones" width="50"></td>
                        <td>{{$extencion->nombre_extenciones}}</td>
                        <td>{{$extencion->cant_extenciones}}</td>
                        <td>{{ $extencion->estatus_extenciones == 1 ? 'Activo' : 'Inactivo' }}</td>
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
        // DataTable para hacer la tabla interactiva
        $(document).ready(function () {
            $('#tabla-extensiones').DataTable({
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
                alert('¿Seguro que deseas eliminar esta extensión?');
                // Aquí puedes agregar una acción para eliminar el registro
            }
        }
    </script>

    @include('fooder')