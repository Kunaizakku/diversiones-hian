<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Extensiones</title>
</head>
<body>

  @include('sidebar')
  
  <div class="form-container">
      <p class="title">Registro de Extensiones</p>
      <form class="form" id="form-register-extensiones" action="{{ route('extencion.insertarextenciones') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <!-- Campo para el nombre de la extensión -->
          <div class="input-group">
            <label for="nombre_extension">Nombre de la Extensión</label>
            <input type="text" name="nombre_extenciones" id="nombre_extenciones" placeholder="Ingresa el nombre de la extensión" required>
          </div>
          
          <!-- Campo para la imagen de la extensión -->
          <div class="input-group">
            <label for="imagen_extension">Imagen de la Extensión</label>
            <input type="file" name="imagen_extenciones" id="imagen_extenciones" required>
          </div>

          <!-- Campo para la cantidad de extensiones -->
          <div class="input-group">
            <label for="cantidad_extension">Cantidad de Extensiones</label>
            <input type="number" name="cant_extenciones" id="cant_extenciones" placeholder="Ingresa la cantidad de extensiones" min="1" required>
          </div>
          
          <!-- Botón para enviar el formulario -->
          <button class="sign">Registrar Extensión</button>
      </form>
  </div>

  @include('fooder')

</body>
</html>
