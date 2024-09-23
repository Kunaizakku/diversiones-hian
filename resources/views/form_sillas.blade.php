<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Registro de Sillas</title>
</head>
<body>

  @include('sidebar')
  <body oncopy="return false" onpaste="return false">
    
  <div class="form-container">
      <p class="title">Registro de Sillas</p>
      <form class="form" id="form-register" action="" method="post">
          @csrf
          <div class="input-group">
            <label for="nombre_silla">Nombre de la Silla</label>
            <input autocomplete="off" type="text" name="nombre_silla" id="nombre_silla" placeholder="Ingresa el nombre de la silla">
          </div>
          <div class="input-group">
            <label for="tipo_silla">Tipo de Silla</label>
            <input autocomplete="off" type="text" name="tipo_silla" id="tipo_silla" placeholder="Ingresa el tipo de silla (Ej. Plegable, acolchonada)">
          </div>
          <div class="input-group">
            <label for="color_silla">Color de la Silla</label>
            <input autocomplete="off" type="text" name="color_silla" id="color_silla" placeholder="Ingresa el color de la silla">
          </div>
          <div class="input-group">
            <label for="cantidad">Cantidad Disponible</label>
            <input type="number" name="cantidad" id="cantidad" placeholder="Ingresa la cantidad disponible" min="1">
          </div>
          <div class="input-group">
            <label for="precio_renta">Precio de Renta por Día</label>
            <input type="number" name="precio_renta" id="precio_renta" placeholder="Ingresa el precio de renta por día" step="0.01" min="0">
          </div>
          <button class="sign">Registrar Silla</button>

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

      {{-- <p class="signup">¿Quieres ver las sillas registradas?, <a href="{{ route('listar_sillas') }}">haz clic aquí</a>.</p> --}}
  </div>

  @include('fooder')

</body>
</html>
