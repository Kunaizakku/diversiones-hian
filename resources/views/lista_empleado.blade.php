<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ruta/a/tu/imagen.ico" rel="icon">
    <title>Empleados registrados</title>
</head>
<body class="body">

    @include('sidebar')
    
    <div class="body-container">
        <div class="table-container">
            <h1>Empleados registrados</h1>
            <br>
            <table id="tabla-empleados">
                <thead>
                    <tr>
                        <th>Nombre del empleado</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Teléfono</th>
                        <th>Sucursal de trabajo</th>
                        <th>Acceso del empleado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí irían los datos de los empleados de forma estática o añadidos con JS -->
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido Paterno</td>
                        <td>Apellido Materno</td>
                        <td>Teléfono</td>
                        <td>Sucursal</td>
                        <td>Acceso</td>
                        <td>
                            <div>
                                <div>
                                    <a href="#">
                                        <i class="bi bi-pencil-square" title="Editar datos"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <i class="bi bi-key" title="Cambiar contraseña"></i>
                                    </a>
                                </div>
                                <div>
                                    <a href="#" onclick="confirmarBaja(event)">
                                        <i class="bi bi-lock" title="Dar baja"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .body-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            padding: 0 20px; /* Espaciado para móviles */
        }
        .table-container {
            width: 100%;
            margin: 0 auto;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
            max-width: 1200px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table thead {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        table tbody tr {
            border-bottom: 1px solid #e0e0e0;
        }
        table tbody tr:hover {
            background-color: #f0f0f0;
        }
        table th {
            font-size: 14px;
            color: #333;
        }
        table td {
            font-size: 13px;
        }
        /* Estilo para pantallas más pequeñas */
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }
            table thead {
                display: none;
            }
            table tr {
                margin-bottom: 15px;
            }
            table td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border-bottom: 1px solid #e0e0e0;
            }
            table td:before {
                content: attr(data-label);
                font-weight: bold;
                text-transform: uppercase;
            }
        }
    </style>
    
    <script>
        // Tabla con DataTable
        $(document).ready(function () {
            $('#tabla-empleados').DataTable({
                "language": {
                    "search": "Buscar:",
                    "info": "Mostrando START a END de TOTAL registros",
                    "zeroRecords": "Sin resultados",
                    "lengthMenu": "Mostrar MENU registros por página",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });

        function confirmarBaja(event) {
            event.preventDefault();

            const link = event.target.closest('a');

            if (link) {
                Swal.fire({
                    title: '¿Seguro?',
                    text: '¿Deseas dar de baja a este empleado?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, dar de baja',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link.href;
                    }
                });
            }
        }
    </script>

</body>
</html>
