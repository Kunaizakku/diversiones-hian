<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Inicio de sesión</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
</head>
<body>

  @include('sidebar')

  <div class="form-container">
      <p class="title">Inicio de sesión</p>
      <form class="form" id="form-login" action="{{ route('usuario.login') }}" method="post">
          @csrf
          <div class="input-group">
              <label for="username">Nombre de usuario</label>
              <input autocomplete="off" type="text" name="usuario" id="username" placeholder="Ingresa tu nombre de usuario">
          </div>
          <div class="input-group">
              <label for="password">Contraseña</label>
              <input type="password" name="contrasena" id="contraseña" placeholder="Ingresa tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener un número, una mayúscula, una minúscula, y ser 8 caracteres" required>
          </div>
          <button class="sign">Iniciar sesión</button>

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

          @if(session('error_status'))
              <script>
                  Swal.fire({
                      title: 'Error',
                      text: '{{ session('error_status') }}',
                      icon: 'error',
                      confirmButtonText: 'Cerrar'
                  });
              </script>
          @endif

          @if(session('error_credentials'))
              <script>
                  Swal.fire({
                      title: 'Error',
                      text: '{{ session('error_credentials') }}',
                      icon: 'error',
                      confirmButtonText: 'Cerrar'
                  });
              </script>
          @endif

          @if(session('error_retry'))
              <script>
                  Swal.fire({
                      title: 'Error',
                      text: '{{ session('error_retry') }}',
                      icon: 'error',
                      confirmButtonText: 'Cerrar'
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
              document.getElementById('form-login').addEventListener('submit', function(event) {
                  var contraseña = document.getElementById('contraseña').value;

                  if (contraseña.length < 8) {
                      Swal.fire({
                          title: 'La contraseña debe tener al menos 8 caracteres.',
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
