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
                        <th>Mesas</th>
                        <th>Brincolines</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dato_rentas as $renta)
                    <tr>
                        <td data-label="Fecha de Entrega">{{$renta->fecha_entrega}}</td>
                        <td data-label="Dirección">{{$renta->direccion}}</td>
                        <td data-label="Número de Celular">{{$renta->celular}}</td>
                        <td data-label="Costo de la Renta">{{$renta->costo}}</td>
                        <td data-label="Sillas">{{$renta->forma_sillas}}</td>
                        <td data-label="Mesas">{{$renta->forma_mesas}}</td>
                        <td data-label="Brincolines">{{$renta->nombre_brincolines}}</td>
                        <td data-label="Acciones">
                            <div class="acciones-iconos">
                                <a href="{{ route('renta.editarrenta', [ 'pk_rentas' => $renta->pk_rentas]) }}">
                                    <i class="bi bi-pencil-square editar" title="Editar renta"></i>
                                </a>
                                <a href="#" onclick="confirmarBaja(event)">
                                    <i class="bi bi-lock eliminar" title="Eliminar renta"></i>
                                </a>
                                <a href="{{ route('renta.ver_renta', ['pk_rentas' => $renta->pk_rentas]) }}">
                                    <i class="bi bi-eye ver" title="Mostrar información de renta"></i>
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
