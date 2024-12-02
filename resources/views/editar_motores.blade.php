<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Editar Motores</title>

    <link rel="manifest" href="{{ asset('/manifest.json') }}">


</head>
<body>

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

    <div class="form-container">
        <p class="title">Editar Motor</p>
        <form class="form" id="form-register-motores" action="{{ route('motor.actualizarmotor', $dato_motor->pk_motores) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group" >
                <label for="">Imagen Actual</label>
                <img src="{{ asset('storage/' . $dato_motor->imagen_motores) }}" alt="" width="150" >
            </div>

            <!-- Campo para la imagen de la extensión -->
            <div class="input-group">
                <label for="imagen_motores">Imagen del motor</label>
                <input type="file" name="imagen_motores" id="imagen_motores" >
            </div>
            
            <!-- Campo para el nombre de la extensión -->
            <div class="input-group">
                <label for="color_motores">Color del motor</label>
                <input type="text" name="color_motores" id="color_motores" placeholder="Ingresa el color del motor" value="{{ $dato_motor->color_motores }}" required>
            </div>

            <!-- Campo para la cantidad de extensiones -->
            <div class="input-group">
                <label for="cant_motores">Cantidad de motores</label>
                <input type="number" name="cant_motores" id="cant_motores" placeholder="Ingresa la cantidad de motores" min="1" value="{{ $dato_motor->cant_motores }}" required>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button class="sign">Actualizar motor</button>
        </form>
    </div>

    @include('fooder')

</body>
</html>
