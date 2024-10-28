<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Rentas Registradas</title>
    <style>
        .body_container_table_rent_details {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 5px; /* Espacio en los bordes */
        }
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }
        .card {
            display: flex;
            flex-direction: column; /* Apilar las filas */
            max-width: 900px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 18px;
            background-color: #e0dddd;
            border-radius: 8px;
            flex: 1; /* Para que ocupe el mismo espacio */
        }
        .field span {
            font-weight: bold;
            display: block;
            font-size: 20px;
            margin-bottom: 5px;
            color: #555;
        }
        .datos-generales-container,
        .sillas-container,
        .mesas-container,
        .manteles-container,
        .otros-container {
            display: flex; /* Mostrar en fila */
            justify-content: space-between; /* Espacio entre los campos */
            gap: 20px; /* Espacio entre campos */
            flex-wrap: wrap; /* Permitir que los elementos se envuelvan */
        }
        .actions_btn_list_renta {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .actions_btn_list_renta a {
            margin-left: 10px;
            color: #2E8B57;
            font-size: 18px;
            text-decoration: none;
        }
        .actions_btn_list_renta a:hover {
            color: #2E8B57;
        }

        /* Responsividad */
        @media (max-width: 600px) {
            h1 {
                font-size: 1.5rem; /* Tamaño de fuente más pequeño en móviles */
                margin: 0; /* Eliminar margen */
            }
            .field {
                font-size: 16px; /* Tamaño de fuente más pequeño en móviles */
                margin: 5px 0; /* Espaciado reducido entre campos */
            }
            .datos-generales-container,
            .sillas-container,
            .mesas-container,
            .manteles-container,
            .otros-container {
                flex-direction: column; /* Cambiar a columna en móviles */
                align-items: stretch; /* Alinear a los extremos */
            }
            .actions_btn_list_renta {
                flex-direction: column; /* Colocar los botones uno debajo del otro */
                align-items: center; /* Centrar los botones */
                margin-top: 10px; /* Espaciado reducido */
            }
        }
    </style>
</head>
<body>

    @include('sidebar')

    <div class="body_container_table_rent_details">
        <h1>Información de Renta</h1>

        <div class="card">
            <!-- Datos Generales -->
            <div class="datos-generales-container">
                <div class="field">
                    <span>Dirección:</span> {{ $dato_renta->direccion }}
                </div>
                <div class="field">
                    <span>Fecha de Entrega:</span> {{ $dato_renta->fecha_entrega }}
                </div>
                <div class="field">
                    <span>Número de Celular:</span> {{ $dato_renta->celular }}
                </div>
                <div class="field">
                    <span>Costo de la Renta:</span> {{ $dato_renta->costo }}
                </div>
            </div>

            <!-- Sillas -->
            <div class="sillas-container">
                <div class="field">
                    <span>Tipo de Silla:</span> {{ $dato_renta->forma_sillas }}
                </div>
                <div class="field">
                    <span>Cantidad de Sillas:</span> {{ $dato_renta->cant_sillas_renta ?? 'sin cantidad de sillas' }}
                </div>
                <div class="field">
                    <span>Audiencia de Sillas:</span> {{ $dato_renta->audiencia_sillas_renta ?? 'sin audiencia de sillas' }}
                </div>
            </div>

            <!-- Mesas -->
            <div class="mesas-container">
                <div class="field">
                    <span>Tipo de Mesa:</span> {{ $dato_renta->forma_mesas }}
                </div>
                <div class="field">
                    <span>Cantidad de Mesas:</span> {{ $dato_renta->cant_mesas_renta ?? 'sin cantidad de mesas' }}
                </div>
                <div class="field">
                    <span>Audiencia de Mesas:</span> {{ $dato_renta->audiencia_mesas_renta ?? 'sin audiencia de mesas' }}
                </div>
            </div>

            <!-- Manteles -->
            <div class="manteles-container">
                <div class="field">
                    <span>Tipo de Manteles:</span> {{ $dato_renta->tipo_manteles_renta }}
                </div>
                <div class="field">
                    <span>Cantidad de Manteles:</span> {{ $dato_renta->cant_manteles_renta ?? 'sin cantidad de manteles' }}
                </div>
            </div>

            <!-- Otros elementos -->
            <div class="otros-container">
                <div class="field">
                    <span>Brincolín Rentado:</span> {{ $dato_renta->nombre_brincolines }}
                </div>
                <div class="field">
                    <span>Motor Rentado:</span> {{ $dato_renta->color_motores }}
                </div>
                <div class="field">
                    <span>Extensión Rentada:</span> {{ $dato_renta->nombre_extenciones }}
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="actions_btn_list_renta">
                <a href="#">
                    <i class="bi bi-pencil-square" title="Editar renta"></i>
                </a>
                <a href="#" onclick="confirmarBaja(event)">
                    <i class="bi bi-lock" title="Eliminar renta"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        function confirmarBaja(event) {
            event.preventDefault();
            const link = event.target.closest('a');
            if (link) {
                const confirmacion = confirm('¿Seguro que deseas eliminar esta renta?');
                if (confirmacion) {
                    // Acción para eliminar el registro
                }
            }
        }
    </script>

    @include('fooder')

</body>
</html>
