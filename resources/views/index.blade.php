<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendario</title>
    <style>

.main-container {
    display: flex; /* Flexbox para alinear el calendario y la tabla */
    width: 100%;
    /* height: calc(100vh - 40px); Altura del contenedor  */
}

.calendar-container {
    background-color: #ffffff; /* Fondo del calendario */
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra suave */
    padding: 20px;
    flex: 1; /* Ocupa el 50% del ancho */
    margin-right: 10px; /* Espacio entre los dos contenedores */
}

.table-container {
    background-color: #ffffff; /* Fondo de la tabla */
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra suave */
    padding: 20px;
    flex: 1; /* Ocupa el 50% del ancho */
}

#calendar {
    text-align: center;
}

#calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

#monthAndYear {
    font-size: 1.5em;
    font-weight: bold;
    color: #333; /* Color del texto */
}

.calendar-container button {
    background-color: #2E8B57; /* Color de botón */
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; /* Transición suave */
    font-size: 1em; /* Tamaño de fuente */
}

.calendar-container button:hover {
    background-color: #2E8B57; /* Color al pasar el mouse */
}

.calendar-container table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px; /* Espacio superior */
}

.calendar-container th, .calendar-container td {
    padding: 15px; /* Espaciado de las celdas */
    text-align: center;
    cursor: pointer;
    border: 1px solid #e0e0e0; /* Bordes sutiles */
    height: 50px; /* Altura de las celdas */
}

.calendar-container thead th {
    background-color: #2E8B57; /* Color del encabezado */
    color: white;
    font-weight: bold;
}

.calendar-container tbody td {
    background-color: #f9f9f9; /* Fondo de las celdas */
    color: #333; /* Color del texto */
    transition: background-color 0.3s; /* Transición suave */
    border-radius: 5px; /* Bordes redondeados */
}

.calendar-container tbody td:hover {
    background-color: #e9f4ff; /* Color al pasar el mouse */
}

.calendar-container tbody td.active {
    background-color: #007bff; /* Color de la celda activa */
    color: white;
    font-weight: bold; /* Resaltar el texto */
}

#calendar-footer {
    margin-top: 20px; /* Espacio superior */
}

#selectedDate {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    background-color: #f9f9f9; /* Fondo del input */
}

/* Media Queries para Responsividad */
@media (max-width: 768px) {
    .calendar-container table, .calendar-container th, .calendar-container td {
        font-size: 14px; /* Reduce el tamaño de la fuente */
    }
}
    </style>
</head>
<body>
    @include("sidebar")
   
    <div class="main-container body-container">
        <!-- Contenedor del calendario -->
        <div class="calendar-container">
            <div id="calendar">
                <div id="calendar-header">
                    <button id="prevMonth">&#9664;</button>
                    <div id="monthAndYear"></div>
                    <button id="nextMonth">&#9654;</button>
                </div>
                <table id="calendar-body">
                    <thead>
                        <tr>
                            <th>Dom</th>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mié</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sáb</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div id="calendar-footer">
                    <input type="text" id="selectedDate" placeholder="Selecciona una fecha" readonly>
                </div>
            </div>
        </div>

        <!-- Contenedor del formulario a la derecha -->
        <div class="table-container">
            <h1>Rentas pendientes</h1>
            <br>
            <table id="tabla-empleados">
                <thead>
                    <tr>
                        <th>Fecha de entrega</th>
                        <th>Direccion</th>
                        <th>Telefono Registrado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div>
                                <a href="#">
                                    <i class="bi bi-eye" title="Ver más detalles"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- Más filas de empleados aquí -->
                </tbody>
            </table>
        </div>
    </div>
   
    <script>
        const calendar = document.getElementById("calendar-body");
        const monthAndYear = document.getElementById("monthAndYear");
        const selectedDateInput = document.getElementById("selectedDate");
        const prevMonthBtn = document.getElementById("prevMonth");
        const nextMonthBtn = document.getElementById("nextMonth");
    
        let date = new Date();
        let selectedCell; // Variable para almacenar la celda seleccionada
        
        function renderCalendar() {
            const month = date.getMonth();
            const year = date.getFullYear();
    
            // Obtener el primer día del mes
            const firstDay = new Date(year, month, 1);
            // Número de días en el mes
            const totalDays = new Date(year, month + 1, 0).getDate();
            // Obtener el último día del mes
            const lastDay = new Date(year, month, totalDays).getDay();
    
            // Reiniciar el calendario
            calendar.innerHTML = '';
    
            // Agregar los espacios en blanco para el primer día
            let row = document.createElement('tr');
            for (let i = 0; i < firstDay.getDay(); i++) {
                let cell = document.createElement('td');
                row.appendChild(cell);
            }
    
            // Agregar los días del mes
            for (let day = 1; day <= totalDays; day++) {
                const cell = document.createElement('td');
                cell.textContent = day;
                cell.addEventListener('click', () => selectDate(day, cell));
                row.appendChild(cell);
    
                // Si el día es sábado, agregar una nueva fila
                if ((firstDay.getDay() + day) % 7 === 0) {
                    calendar.appendChild(row);
                    row = document.createElement('tr');
                }
            }
    
            // Agregar espacios en blanco para el final del mes
            for (let i = lastDay + 1; i < 7; i++) {
                let cell = document.createElement('td');
                row.appendChild(cell);
            }
    
            calendar.appendChild(row);
            monthAndYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;
        }
    
        function selectDate(day, cell) {
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            const formattedDate = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
            selectedDateInput.value = formattedDate;
    
            // Desmarcar la celda previamente seleccionada
            if (selectedCell) {
                selectedCell.classList.remove('active');
            }
            // Marcar la nueva celda seleccionada
            cell.classList.add('active');
            selectedCell = cell;
    
            // Hacer la solicitud AJAX
            fetch(`/get-rentas/${formattedDate}`)
                .then(response => response.json())
                .then(data => {
                    // Limpiar la tabla
                    const tableBody = document.querySelector("#tabla-empleados tbody");
                    tableBody.innerHTML = '';
                    
                    // Crear la URL para ver la renta usando el pk_rentas dentro del ciclo forEach
                    data.forEach(renta => {
                        const viewRentaUrl = `/renta/${renta.pk_rentas}`; // Ruta a la que deseas redirigir
    
                        const row = `
                            <tr>
                                <td>${renta.fecha_entrega}</td>
                                <td>${renta.direccion}</td>
                                <td>${renta.celular}</td>
                                <td><a href="${viewRentaUrl}"><i class="bi bi-eye" title="Ver más detalles"></i></a></td>
                            </tr>`;
                        
                        // Agregar la fila a la tabla
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error:', error)); // Manejo de errores
        }
    
        function setTodayDate() {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0'); // Día de dos dígitos
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Mes de dos dígitos
            const year = today.getFullYear();
            selectedDateInput.value = `${year}/${month}/${day}`; // Formato: año/mes/día
        }
    
        // Botones para cambiar de mes
        prevMonthBtn.addEventListener('click', () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });
    
        nextMonthBtn.addEventListener('click', () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });
    
        // Inicializar el calendario y establecer la fecha de hoy
        renderCalendar();
        setTodayDate(); // Llama a la función para establecer la fecha de hoy
    </script>
    
    @include('fooder')
</body>
</html>


