<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Rentas Registradas</title>
    <style>
        .body-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            width: 100%;
        }
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        .card {
            display: flex;
            justify-content: space-between; /* Espacio entre las columnas */
            gap: 20px; /* Añadir espacio entre columnas */
            max-width: 900px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
        }
        .column {
            flex: 1; /* Ocupa el mismo espacio */
            padding: 10px;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .field span {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .actions_btn_list_renta {
            width: 100%;
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
        /* Responsividad para pantallas pequeñas */
        @media (max-width: 768px) {
            .card {
                flex-direction: column; /* Apila las columnas en pantallas pequeñas */
            }
            .column {
                width: 100%; /* Las columnas ocupan todo el ancho */
            }
        }
    </style>
</head>
<body>

    @include('sidebar')

    <div class="body-container">
        <h1>Información de Renta</h1>

        <div class="card">
            <div class="column">
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
            <div class="column">
                <div class="field">
                    <span>Tipo de Mesa:</span> {{ $dato_renta->forma_mesas }}
                </div>
                <div class="field">
                    <span>Cantidad de Mesas:</span> {{ $dato_renta->cant_mesas_renta ?? 'sin cantidad de mesas' }}
                </div>
                <div class="field">
                    <span>Audiencia de Mesas:</span> {{ $dato_renta->audiencia_mesas_renta ?? 'sin audiencia de mesas' }}
                </div>
                <div class="field">
                    <span>Tipo de Manteles:</span> {{ $dato_renta->tipo_manteles_renta }}
                </div>
                <div class="field">
                    <span>Cantidad de Manteles:</span> {{ $dato_renta->cant_manteles_renta ?? 'sin cantidad de manteles' }}
                </div>
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
