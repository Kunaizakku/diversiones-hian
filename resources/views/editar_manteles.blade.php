<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Editar manteles</title>
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
        <p class="title">Editar mantel</p>
        <form class="form" id="form-register-manteles" action="{{ route('mantel.actualizarmantel', $dato_mantel->pk_manteles) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group" >
                <label for="">Imagen Actual</label>
                <img src="{{ asset('storage/' . $dato_mantel->imagen_manteles) }}" alt="" width="150" >
            </div>

            <!-- Campo para la imagen de la extensión -->
            <div class="input-group">
                <label for="imagen_manteles">Imagen del mantel</label>
                <input type="file" name="imagen_manteles" id="imagen_manteles" >
            </div>
            
            <!-- Campo para el nombre de la extensión -->
            <div class="input-group">
                <label for="color_manteles">Color del mantel</label>
                <input type="text" name="color_manteles" id="color_manteles" placeholder="Ingresa el color del mantel" value="{{ $dato_mantel->color_manteles }}" required>
            </div>

            <!-- Campo para la cantidad de extensiones -->
            <div class="input-group">
                <label for="cant_manteles">Cantidad de manteles</label>
                <input type="number" name="cant_manteles" id="cant_manteles" placeholder="Ingresa la cantidad de manteles" min="1" value="{{ $dato_mantel->cant_manteles }}" required>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button class="sign">Actualizar mantel</button>
        </form>
    </div>

    @include('fooder')

</body>
</html>
