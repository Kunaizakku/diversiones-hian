<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Sillas</title>
</head>
<body>

  <form action="{{ route('silla.insertarsilla') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Campo para subir la imagen de la silla -->
    <div class="input-group">
      <label for="imagen_silla">Imagen de la Silla</label>
      <input type="file" name="imagen_silla" id="imagen_silla">
    </div>

    <!-- Campo para ingresar la forma de la silla -->
    <div class="input-group">
      <label for="forma_sillas">Forma de la Silla</label>
      <input type="text" name="forma_sillas" id="forma_sillas" placeholder="Ej. Redonda, Cuadrada">
    </div>

    <!-- Campo para ingresar la cantidad de sillas -->
    <div class="input-group">
      <label for="cant_sillas">Cantidad de Sillas</label>
      <input type="number" name="cant_sillas" id="cant_sillas" placeholder="Ingresa la cantidad de sillas" min="1">
    </div>

    <!-- Campo para seleccionar la audiencia dirigida de las sillas -->
    <div class="input-group">
      <label for="audiencia_sillas">Audiencia Dirigida</label>
      <select name="audiencia_sillas" id="audiencia_sillas">
        <option value="Adultos">Adultos</option>
        <option value="Niños">Niños</option>
      </select>
    </div>

    <!-- Botón para enviar el formulario -->
    <div class="input-group">
      <input type="submit" value="Agregar Sillas">
    </div>

  </form>

</body>
</html>
