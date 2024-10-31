@include('sidebar')
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
