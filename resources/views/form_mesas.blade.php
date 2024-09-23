<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diversiones-Hian | Registro de Mesas</title>
</head>
<body>
@include('sidebar')
<body oncopy="return false" onpaste="return false">

<div class="form-container">
  <form action="{{ route('mesa.insertarmesa') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Campo para la imagen de la mesa -->
    <div class="input-group">
      <label for="imagen_mesa">Imagen de la Mesa</label>
      <input type="file" name="imagen_mesa" id="imagen_mesa">
    </div>

    <!-- Campo para la forma de la mesa -->
    <div class="input-group">
      <label for="forma_mesas">Forma de la Mesa</label>
      <input type="text" name="forma_mesas" id="forma_mesas" placeholder="Ingresa la forma de la mesa">
    </div>

    <!-- Campo para la cantidad de mesas -->
    <div class="input-group">
      <label for="cant_mesas">Cantidad de Mesas</label>
      <input type="number" name="cant_mesas" id="cant_mesas" placeholder="Ingresa la cantidad de mesas" min="1">
    </div>

    <!-- Campo para seleccionar la audiencia dirigida de las mesas -->
    <div class="input-group">
      <label for="audiencia_mesas">Audiencia Dirigida</label>
      <select name="audiencia_mesas" id="audiencia_mesas">
        <option value="Adultos">Adultos</option>
        <option value="Niños">Niños</option>
      </select>
    </div>

    <!-- Botón para enviar el formulario -->
    <button class="sign">Agregar Mesas</button>
  </form>
</div>

@include('fooder')

</body>
</html>
