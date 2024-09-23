<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Registro de Mesas</title>
</head>
<body>

  @include('sidebar')
  
  <div class="form-container">
      <p class="title">Registro de Mesas</p>
      <form class="form" id="form-register" action="" method="post">
          @csrf
          <div class="input-group">
            <label for="nombre_mesa">Nombre de la Mesa</label>
            <input autocomplete="off" type="text" name="nombre_mesa" id="nombre_mesa" placeholder="Ingresa el nombre de la mesa">
          </div>
          <div class="input-group">
            <label for="tipo_mesa">Tipo de Mesa</label>
            <input autocomplete="off" type="text" name="tipo_mesa" id="tipo_mesa" placeholder="Ingresa el tipo de mesa (Ej. Redonda, rectangular)">
          </div>
          <div class="input-group">
            <label for="material_mesa">Material de la Mesa</label>
            <input autocomplete="off" type="text" name="material_mesa" id="material_mesa" placeholder="Ingresa el material de la mesa (Ej. Madera, plástico)">
          </div>
          <div class="input-group">
            <label for="color_mesa">Color de la Mesa</label>
            <input autocomplete="off" type="text" name="color_mesa" id="color_mesa" placeholder="Ingresa el color de la mesa">
          </div>
          <div class="input-group">
            <label for="cantidad_mesas">Cantidad Disponible</label>
            <input type="number" name="cantidad_mesas" id="cantidad_mesas" placeholder="Ingresa la cantidad disponible" min="1">
          </div>
          <div class="input-group">
            <label for="precio_renta_mesa">Precio de Renta por Día</label>
            <input type="number" name="precio_renta_mesa" id="precio_renta_mesa" placeholder="Ingresa el precio de renta por día" step="0.01" min="0">
          </div>
          <button class="sign">Registrar Mesa</button>

          @if($errors->any())
          @foreach($errors->all() as $error)
              <script>
                  function showErrorToast(message) {
                      Swal.fire({
                          title: message,
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 5000,
                          timerProgressBar: true,
                          icon: 'error',
                          didOpen: (toast) => {
                              toast.addEventListener('mouseenter', Swal.stopTimer);
                              toast.addEventListener('mouseleave', Swal.resumeTimer);
                          }
                      });
                  }
                  showErrorToast('{{ $error }}');
              </script>
          @endforeach
          @endif
      </form>

      {{-- <p class="signup">¿Quieres ver las mesas registradas?, <a href="{{ route('listar_mesas') }}">haz clic aquí</a>.</p> --}}
  </div>

  @include('fooder')

</body>
</html>
