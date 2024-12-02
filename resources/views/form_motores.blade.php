<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Diversiones-Hian | Registro de Motores</title>

    <link rel="manifest" href="{{ asset('/manifest.json') }}">

</head>
<body oncopy="return false" onpaste="return false">
    @include('sidebar')

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session("error") }}',
                icon: 'error',
                confirmButtonText: 'Aceptar' 
            });
        </script>
    @endif

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

    <div class="form-container">
        <form action="{{ route('motor.insertarmotor') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Campo para la imagen de la mesa -->
            <div class="input-group">
                <label for="imagen_motor">Imagen del motor</label>
                <input type="file" name="imagen_motor" id="imagen_motor" required>
            </div>
            <!-- Campo para el color del motor-->
            <div class="input-group">
                <label for="color_motor">Color del motor</label>
                <input type="text" name="color_motor" id="color_motor" placeholder="Ingresa la forma de la mesa" required>
            </div>
            <!-- Campo para la cantidad de motores -->
            <div class="input-group">
                <label for="cant_motor">Cantidad de Mesas</label>
                <input type="number" name="cant_motor" id="cant_motor" placeholder="Ingresa la cantidad de mesas" min="1" required>
            </div>
            <!-- Botón para enviar el formulario -->
            <button class="sign">Agregar Motor</button>
        </form>
    </div>

    @include('fooder')
</body>
</html>
