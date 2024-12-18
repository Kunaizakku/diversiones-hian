<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Diversiones-Hian | Inicio de sesión</title>
  <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=1">
  <link rel="stylesheet" href="{{ asset('css/tablas.css') }}?v=1">
  <link rel="stylesheet" href="{{ asset('css/formularios.css') }}?v=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
<body>

 

    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error_credentials'))
        <div class="alert alert-danger">
            {{ session('error_credentials') }}
        </div>
    @elseif (session('error_retry'))
        <div class="alert alert-danger">
            {{ session('error_retry') }}
        </div>
    @elseif (session ('error_status'))
        <div class="alert alert-danger">
            {{ session('error_status') }}
        </div>
    @endif --}}
        
  <div class="form-container" style="margin-top: 15vh; >
      <p class="title">Inicio de sesión</p>
      <form class="form" id="form-login" action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group">
              <label for="username">Nombre de usuario</label>
              <input autocomplete="off" type="text" name="usuario" id="username" placeholder="Ingresa tu nombre de usuario" required>
          </div>
          <div class="input-group">
              <label for="password">Contraseña</label>
              <input type="password" name="contrasena" id="contraseña" placeholder="Ingresa tu contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener un número, una mayúscula, una minúscula, y ser 8 caracteres" required>
          </div>
          <button class="sign" >Iniciar sesión</button>

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

        <!-- Eliminada la validación en JavaScript para la longitud mínima de la contraseña -->
    </form>
</div>

@include('fooder')

</body>


<script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>
</html>
