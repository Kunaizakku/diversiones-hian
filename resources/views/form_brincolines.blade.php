<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Registro de Brincolines</title>
</head>
<body>

  @include('sidebar')
  <body oncopy="return false" onpaste="return false">
    
  <div class="form-container">
      <p class="title">Registro de Brincolines</p>
      <form class="form" id="form-register-brincolines" action="{{ route('brincolin.insertarbrincolin') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <!-- Campo para la imagen del brincolín -->
          <div class="input-group">
            <label for="imagen_brincolines">Imagen del Brincolín</label>
            <input type="file" name="imagen_brincolines" id="imagen_brincolines">
          </div>
          
          <!-- Campo para el nombre del brincolín -->
          <div class="input-group">
            <label for="nombre_brincolines">Nombre del Brincolín</label>
            <input type="text" name="nombre_brincolines" id="nombre_brincolines" placeholder="Ingresa el nombre del brincolín">
          </div>
          
          <!-- Campo para la cantidad de brincolines -->
          <div class="input-group">
            <label for="cant_brincolines">Cantidad de Brincolines</label>
            <input type="number" name="cant_brincolines" id="cant_brincolines" placeholder="Ingresa la cantidad de brincolines" min="1">
          </div>

          <!-- Campo para la categoría del brincolín (acuático o seco) -->
          <div class="input-group">
            <label for="cat_brincolines">Categoría del Brincolín</label>
            <select name="cat_brincolines" id="cat_brincolines">
              <option value="acuatico">Acuático</option>
              <option value="seco">Seco</option>
            </select>
          </div>

          <!-- Campo para el tamaño del brincolín (grande, mediano, chico) -->
          <div class="input-group">
            <label for="tam_brincolines">Tamaño del Brincolín</label>
            <select name="tam_brincolines" id="tam_brincolines">
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
