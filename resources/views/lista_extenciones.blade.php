<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Extensiones Registradas</title>
</head>
<body class="body">

    @include('sidebar')
    
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
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
                        <th>Estado de Extensiones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Datos de ejemplo estáticos -->
                    @foreach ($dato_extensiones as $extencion)
                    <tr>
                        <td data-label="Imagen de la Extensión"><img src="{{ asset('storage/' . $extencion->imagen_extenciones) }}" alt="{{ $extencion->nombre_extenciones }}" width="50"></td>
                        <td data-label="Nombre de la Extensión">{{$extencion->nombre_extenciones}}</td>
                        <td data-label="Cantidad">{{$extencion->cant_extenciones}}</td>
                        <td data-label="Estado de Extensiones">{{ $extencion->estatus_extenciones == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td data-label="Opciones">
                            <div class="acciones-iconos">
                                <a href="{{ route('extencion.editarextencion', ['pk_extenciones' => $extencion->pk_extenciones]) }}">
                                    <i class="bi bi-pencil-square editar" title="Editar extensión"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock eliminar" title="Eliminar extensión"></i>
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
                alert('¿Seguro que deseas eliminar esta extensión?');
                // Aquí puedes agregar una acción para eliminar el registro
            }
        }
    </script>

    @include('fooder')

</body>
</html>
