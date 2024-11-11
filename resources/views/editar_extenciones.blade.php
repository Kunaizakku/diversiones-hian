<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Registro de Extensiones</title>
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
        <p class="title">Editar Extension</p>
        <form class="form" id="form-register-extensiones" action="{{ route('extencion.actualizarextencion', $dato_extenciones->pk_extenciones) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group" >
                <label for="">Imagen Actual</label>
                <div class="img_form_edit">
                    <img src="{{ asset('storage/' . $dato_extenciones->imagen_extenciones) }}" alt="" width="150" >
                </div>
            </div>

            <!-- Campo para la imagen de la extensión -->
            <div class="input-group">
                <label for="imagen_extenciones">Imagen de la Extensión</label>
                <input type="file" name="imagen_extenciones" id="imagen_extenciones" >
            </div>
            
            <!-- Campo para el nombre de la extensión -->
            <div class="input-group">
                <label for="nombre_extensiones">Nombre de la Extensión</label>
                <input type="text" name="nombre_extenciones" id="nombre_extensiones" placeholder="Ingresa el nombre de la extensión" value="{{ $dato_extenciones->nombre_extenciones }}" required>
            </div>

            <!-- Campo para la cantidad de extensiones -->
            <div class="input-group">
                <label for="cant_extenciones">Cantidad de Extensiones</label>
                <input type="number" name="cant_extenciones" id="cant_extenciones" placeholder="Ingresa la cantidad de extensiones" min="1" value="{{ $dato_extenciones->cant_extenciones }}" required>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button class="sign">Registrar Extensión</button>
        </form>
    </div>

    @include('fooder')

</body>
</html>
