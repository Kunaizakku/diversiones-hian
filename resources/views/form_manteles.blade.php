<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Manteles</title>
</head>
<body>

  @include('sidebar')
  @include('mensaje')
  
  <div class="form-container">
      <p class="title">Registro de Manteles</p>
      <form class="form" id="form-register-manteles" action="{{ route('mantel.insertarmanteles') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <!-- Campo para la imagen del mantel -->
          <div class="input-group">
            <label for="imagen_mantel">Imagen del Mantel</label>
            <input type="file" name="imagen_mantel" id="imagen_mantel" required>
          </div>
          
          <!-- Campo para el color del mantel -->
          <div class="input-group">
            <label for="color_mantel">Color del Mantel</label>
            <input type="text" name="color_mantel" id="color_mantel" placeholder="Ingresa el color del mantel" required>
          </div>

          <!-- Campo para el tipo de mantel -->
          <div class="input-group">
            <label for="tipo_mantel">Tipo de Mantel</label>
            <select name="tipo_mantel" id="tipo_mantel" required>
              <option value="">-- Seleccione una Opción --</option>
              <option value="redondo">Redondo</option>
              <option value="cuadrado">Cuadrado</option>
              <option value="rectangular">Rectangular</option>
            </select>
          </div>

          <!-- Campo para la cantidad de manteles -->
          <div class="input-group">
            <label for="cantidad_mantel">Cantidad de Manteles</label>
            <input type="number" name="cantidad_mantel" id="cantidad_mantel" placeholder="Ingresa la cantidad de manteles" min="1" required>
          </div>
          
          <!-- Botón para enviar el formulario -->
          <button class="sign">Registrar Mantel</button>
      </form>
  </div>

  @include('fooder')

</body>
</html>
