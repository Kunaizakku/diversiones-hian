<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Diversiones-Hian | Registro de Brincolines</title>

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
        <p class="title">Registro de Brincolines</p>
        <form class="form" id="form-register-brincolines" action="{{ route('brincolin.insertarbrincolin') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <!-- Campo para la imagen del brincolín -->
            <div class="input-group">
                <label for="imagen_brincolines">Imagen del Brincolín</label>
                <input type="file" name="imagen_brincolines" id="imagen_brincolines" required required>
            </div>
            
            <!-- Campo para el nombre del brincolín -->
            <div class="input-group">
                <label for="nombre_brincolines">Nombre del Brincolín</label>
                <input type="text" name="nombre_brincolines" id="nombre_brincolines" placeholder="Ingresa el nombre del brincolín" required>
            </div>
            
            <!-- Campo para la cantidad de brincolines -->
            <div class="input-group">
                <label for="cant_brincolines">Cantidad de Brincolines</label>
                <input type="number" name="cant_brincolines" id="cant_brincolines" placeholder="Ingresa la cantidad de brincolines" min="1" required>
            </div>

            <!-- Campo para la categoría del brincolín -->
            <div class="input-group">
                <label for="cat_brincolines">Categoría del Brincolín</label>
                <select name="cat_brincolines" id="cat_brincolines" required>
                    <option value="acuatico">Acuático</option>
                    <option value="seco">Seco</option>
                </select>
            </div>

            <!-- Campo para el tamaño del brincolín -->
            <div class="input-group">
                <label for="tam_brincolines">Tamaño del Brincolín</label>
                <select name="tam_brincolines" id="tam_brincolines" required>
                    <option value="grande">Grande</option>
                    <option value="mediano">Mediano</option>
                    <option value="chico">Chico</option>
                </select>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button class="sign">Agregar Brincolín</button>
        </form>
    </div>

    @include('fooder')

</body>
</html>
