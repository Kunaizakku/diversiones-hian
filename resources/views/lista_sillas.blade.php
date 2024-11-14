<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Sillas Registradas</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery para DataTable -->
</head>

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
<body class="body">

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
                    @foreach ($dato_sillas as $silla)
                    <tr>
                        <td data-label="Imagen de la Silla">
                            <img src="{{ asset('storage/' . $silla->imagen_sillas) }}" alt="{{$silla->forma_sillas}}" width="50" style="border-radius: 5px;">
                        </td>
                        <td data-label="Forma de la Silla">{{$silla->forma_sillas}}</td>
                        <td data-label="Cantidad">{{$silla->cant_sillas}}</td>
                        <td data-label="Audiencia Dirigida">{{$silla->audiencia_sillas}}</td>
                        <td data-label="Estado de Sillas">
                            {{ $silla->estatus_sillas == 1 ? 'Activo' : 'Inactivo' }}
                        </td>
                        <td data-label="Opciones">
                            <div class="acciones-iconos">
                                <a href="{{route('silla.editarsilla', ['pk_sillas' => $silla->pk_sillas])}}">
                                    <i class="bi bi-pencil-square editar" title="Editar silla"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock eliminar" title="Eliminar silla"></i>
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
                Swal.fire({
                    title: '¿Seguro?',
                    text: '¿Deseas eliminar esta silla?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí puedes agregar la lógica para eliminar la silla
                        alert('Silla eliminada');  // Simulación de eliminación
                    }
                });
            }
        }
    </script>

</body>
</html>
