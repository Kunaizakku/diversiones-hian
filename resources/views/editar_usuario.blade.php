<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Registro</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
</head>
<body>

  @include('sidebar')

  <div class="form-container">
      <p class="title">Actualizar usuario</p>
      <form class="form" id="form-register" action="{{route('usuario.actualizar', $dato_usuario->pk_usuario)}}" method="post">
          @csrf
        <div class="input-group">
          <label for="username">Nombre</label>
          <input autocomplete="off" type="text" value="{{ $dato_usuario->nombre }}" name="nombre" id="username"  placeholder="Ingresa tu nombre de usuario">
        </div>
        <div class="input-group">
            <label for="username">Usuario</label>
            <input autocomplete="off" type="text" value="{{ $dato_usuario->usuario }}" name="usuario" id="username" placeholder="Ingresa tu nombre de usuario">
          </div>
        <button class="sign">Actualizar</button>

        @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <script>
                    Swal.fire({
                        title: 'Error',
                        text: '{{ $error }}',
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    });
                </script>
            @endforeach
        @endif

        <script>
            document.getElementById('form-register').addEventListener('submit', function(event) {
                var contraseña = document.getElementById('contraseña').value;
                var confirmar_contraseña = document.getElementById('conf_contraseña').value;

                if (contraseña !== confirmar_contraseña) {
                    Swal.fire({
                        title: 'Las contraseñas no coinciden.',
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    });
                    event.preventDefault();
                }
            });
        </script>

      </form>
  </div>

  @include('fooder')

</body>
</html>
