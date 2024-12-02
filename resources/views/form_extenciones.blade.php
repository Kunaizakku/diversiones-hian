<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
    <title>Registro de Extensiones</title>

    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>

    @include('sidebar')

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session("error") }}',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    <div class="form-container">
        <p class="title">Registro de Extensiones</p>
        <form id="formulario" class="form" id="form-register-extensiones"  method="post" enctype="multipart/form-data"> {{--  action="{{ route('extencion.insertarextenciones') }}" --}}
            @csrf
            
            <!-- Campo para el nombre de la extensión -->
            <div class="input-group">
                <label for="nombre_extensiones">Nombre de la Extensión</label>
                <input type="text" name="nombre_extenciones" id="nombre_extenciones" placeholder="Ingresa el nombre de la extensión" required>
            </div>
            
            <!-- Campo para la imagen de la extensión -->
            <div class="input-group">
                <label for="imagen_extenciones">Imagen de la Extensión</label>
                <input type="file" name="imagen_extenciones" id="imagen_extenciones" required>
            </div>

            <!-- Campo para la cantidad de extensiones -->
            <div class="input-group">
                <label for="cant_extenciones">Cantidad de Extensiones</label>
                <input type="number" name="cant_extenciones" id="cant_extenciones" placeholder="Ingresa la cantidad de extensiones" min="1" required>
            </div>
            
            <!-- Botón para enviar el formulario -->
            <button class="sign">Registrar Extensión</button>
        </form>
    </div>

    @include('fooder')

    <script href="{{ asset('/manifest.json') }}"></script>


    <script>
        const sincronizarURL = "{{ route('extencion.sincronizar') }}";

        let bd;
        //aquí definimos el nombre de la BD
        const abrirBD=indexedDB.open('diversiones_hian',1);

        abrirBD.onupgradeneeded = (e) =>{
            bd = e.target.result;
            //aquí estoy creando un objeto (el equivalente a una tabla)
            bd.createObjectStore('extensiones', {keyPath: 'pk_extenciones', autoIncrement: true});
        };
        //si nuestra bd sí se abre con éxito...
        abrirBD.onsuccess = (e) =>{
            bd = e.target.result;
            //esto es solo para mostrar mensajito para confirmar
            console.log('bd abierta :) ');
            sincronizar();
        };
        
        $('#formulario').on('submit', function(e){
            e.preventDefault();
            let nombre_extenciones=$('#nombre_extenciones').val();
            let cant_extenciones=$('#cant_extenciones').val();
            let imagen_extenciones='';
            if ($('#imagen_extenciones')[0].files[0]) {
                let imagen = $('#imagen_extenciones')[0].files[0];
                let rutaimagen = `images/${imagen.name}`;
                imagen_extenciones = rutaimagen;
            }
            const p=bd.transaction(['extensiones'], 'readwrite');
            const insert=p.objectStore('extensiones');
            insert.add({nombre_extenciones: nombre_extenciones, imagen_extenciones: imagen_extenciones, cant_extenciones: cant_extenciones, estatus: false});
            $('#nombre_extenciones').val('');
            $('#imagen_extenciones').val('');
            $('#cant_extenciones').val('');
            console.log('Guardado localmente');
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        })

        function obtenerExtensiones() {
            return new Promise((resolve, reject) => {
                const t=bd.transaction(['extensiones'], 'readwrite');
                const store=t.objectStore('extensiones');
                const request=store.getAll();
                request.onsuccess= () => {
                    resolve(request.result);
                };
                request.onerror = (error) => {
                    reject(request.error);
                };
            })
        };

        async function sincronizar() {
            try {
                const extensiones = await obtenerExtensiones();
                for (const extension of extensiones) {
                    if (!extension.estatus) {
                        const response = await fetch(sincronizarURL, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Aquí incluimos el token
                            },
                            body: JSON.stringify(extension)
                        });
                        if (response.ok) {
                            cambiarEstatus(extension.pk_extenciones);
                        }
                    }
                }
            } catch (error) {
                console.log(error);
            }
        }


        function cambiarEstatus(id){
            const t=bd.transaction(['extensiones'], 'readwrite');
            const store=t.objectStore('extensiones');
            const request=store.get(id);

            request.onsuccess= () => {
                console.log('Sincronizando');
                let extensiones = request.result;
                extensiones.estatus=true;
                store.put(extensiones);
            };
        }

    </script>

</body>
</html>
