<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Diversiones-Hian | Registro de Mesas</title>

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
        <p class="title">Editar Mesa</p>
        <form action="{{ route('mesa.actualizarmesa', $dato_mesas->pk_mesas) }}" method="post" enctype="multipart/form-data">
            @csrf
        
            <div class="input-group" >
                <label for="">Imagen Actual</label>
                <div class="img_form_edit">
                    <img src="{{ asset('storage/' . $dato_mesas->imagen_mesas) }}" alt="" width="150" >
                </div>
            </div>

            <!-- Campo para la imagen de la mesa -->
            <div class="input-group">
                <label for="imagen_mesa">Imagen de la Mesa</label>
                <input type="file" name="imagen_mesa" id="imagen_mesa" >
            </div>

            <!-- Campo para la forma de la mesa -->
            <div class="input-group">
                <label for="forma_mesas">Forma de la Mesa</label>
                <input type="text" name="forma_mesas" id="forma_mesas" placeholder="Ingresa la forma de la mesa" value="{{ $dato_mesas->forma_mesas }}" required>
            </div>

            <!-- Campo para la cantidad de mesas -->
            <div class="input-group">
                <label for="cant_mesas">Cantidad de Mesas</label>
                <input type="number" name="cant_mesas" id="cant_mesas" placeholder="Ingresa la cantidad de mesas" min="1" value="{{ $dato_mesas->cant_mesas }}" required>
            </div>

            <!-- Campo para seleccionar la audiencia dirigida de las mesas -->
            <div class="input-group">
                <label for="audiencia_mesas">Audiencia Dirigida</label>
                <select name="audiencia_mesas" id="audiencia_mesas" value="{{ $dato_mesas->audiencia_mesas }}" required>
                    <option value="Adultos">Adultos</option>
                    <option value="Niños">Niños</option>
                </select>
            </div>

            <!-- Botón para enviar el formulario -->
            <button class="sign">Confirmar Cambios</button>
        </form>
    </div>

    @include('fooder')
</body>
</html>
