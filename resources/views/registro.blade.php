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
      <p class="title">Registro</p>
      <form class="form" id="form-register" action="{{route('usuario.insertar')}}" method="post">
          @csrf
        <div class="input-group">
          <label for="username">Nombre</label>
          <input autocomplete="off" type="text" name="nombre" id="username" placeholder="Ingresa tu nombre de usuario">
        </div>
        <div class="input-group">
            <label for="username">Usuario</label>
            <input autocomplete="off" type="text" name="usuario" id="username" placeholder="Ingresa tu nombre de usuario">
          </div>
        <div class="input-group">
          <label for="password">Contraseña</label>
          <input type="password" name="contrasena" id="contraseña" placeholder="Ingresa tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener un número, una mayúscula, una minúscula, y ser 8 caracteres" required>
        </div>
        <div class="input-group">
          <label for="password">Confirmar contraseña</label>
          <input type="password" name="conf_contrasena" id="conf_contraseña" placeholder="Ingresa tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener un número, una mayúscula, una minúscula, y ser 8 caracteres" required>
        </div>
        <button class="sign">Regístrate</button>

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
      <p class="signup">¿Ya tienes una cuenta con nosotros?, <a href="{{ route('login') }}">inicia sesión aquí</a>.</p>
  </div>

  @include('fooder')

</body>
</html>
