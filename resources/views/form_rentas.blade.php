<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Renta</title>
</head>
<body>

  @include('sidebar')
  <body oncopy="return false" onpaste="return false">

  <div class="form-container">
    <p class="title">Registro de Renta</p>
    <form action="{{ route('renta.insertarrentas') }}" method="post" enctype="multipart/form-data">
      @csrf

      <!-- Campo para la fecha de entrega -->
      <div class="input-group">
        <label for="fecha_entrega">Fecha de Entrega</label>
        <input type="datetime-local" name="fecha_entrega" id="fecha_entrega" required>
      </div>

      <!-- Campo para el número de celular -->
      <div class="input-group">
        <label for="celular">Número de Celular</label>
        <input type="tel" name="celular" id="celular" placeholder="Ingresa el número de celular" required pattern="[0-9]{10}">
      </div>

      <!-- Campo para la dirección -->
      <div class="input-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" placeholder="Ingresa la dirección" maxlength="100" required>
      </div>

      <!-- Campo para el costo de la renta -->
      <div class="input-group">
        <label for="costo">Costo de la Renta</label>
        <input type="number" name="costo" id="costo" placeholder="Ingresa el costo" min="0" step="0.01" required>
      </div>

      <!-- Campo para seleccionar el inventario relacionado -->
      <div class="input-group">
        <label for="fk_inventario">Inventario Relacionado</label>
        <select name="fk_inventario" id="fk_inventario" required>
          {{-- @foreach($inventarios as $inventario) --}}
            <option value="">dhg</option>
          {{-- @endforeach --}}
        </select>
      </div>

      <!-- Botón para enviar el formulario -->
      <div class="input-group">
        <button class="sign">Registrar Renta</button>
      </div>

    </form>
  </div>

  @include('fooder')

</body>
</html>
