<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include("sidebar")

    <div class="main-container body-container">
        <!-- Contenedor del calendario -->
        <div class="calendar-container body-containers">
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
        <div class="right-container">
            <div class="table-container">
                <h1>Rentas pendientes</h1>
                <br>
                <table id="tabla-empleados">
                    <thead>
                        <tr>
                            <th>Nom empleado</th>
                            <th>Direccion</th>
                            <th>Estatus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí puedes añadir los datos de los empleados de forma estática o con JavaScript -->
                        <tr>
                            <td>Juan Pérez</td>
                            <td>jperez</td>
                            <td>Activo</td>
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
    </div>
       

    <script>
        const calendarBody = document.querySelector("#calendar-body tbody");
        const monthAndYear = document.getElementById("monthAndYear");
        const selectedDateInput = document.getElementById("selectedDate");
    
        let today = new Date();
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth();
        let currentDay = today.getDate();
        let selectedDate = null;
    
        const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    
        // Escuchar los botones de navegación
        document.getElementById("prevMonth").addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });
    
        document.getElementById("nextMonth").addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });
    
        // Generar el calendario
        function generateCalendar(month, year) {
            calendarBody.innerHTML = "";
            monthAndYear.innerHTML = `${months[month]} ${year}`;
    
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
    
            let date = 1;
    
            for (let i = 0; i < 6; i++) {
                const row = document.createElement("tr");
    
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement("td");
    
                    if (i === 0 && j < firstDayOfMonth) {
                        cell.innerHTML = "";
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        cell.innerHTML = date;
    
                        // Marcar el día de hoy por defecto
                        if (year === today.getFullYear() && month === today.getMonth() && date === today.getDate()) {
                            cell.classList.add("active");
                            selectedDate = new Date(year, month, date);
                            selectedDateInput.value = selectedDate.toLocaleDateString();
                        }
    
                        // Añadir el evento de clic
                        cell.addEventListener("click", function () {
                            selectDate(cell, year, month, date);
                        });
                        date++;
                    }
                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
            }
        }
    
        // Función para seleccionar una fecha
    // Función para seleccionar una fecha
    function selectDate(cell, year, month, date) {
        // Remover clase 'active' de la celda previamente seleccionada
        const activeCell = document.querySelector(".active");
        if (activeCell) {
            activeCell.classList.remove("active");
        }

        // Añadir clase 'active' a la nueva celda seleccionada
        cell.classList.add("active");

        // Actualizar la fecha seleccionada y el valor del input
        selectedDate = new Date(year, month, date);
        const formattedDate = selectedDate.toISOString().split('T')[0]; // Formato YYYY-MM-DD
        selectedDateInput.value = selectedDate.toLocaleDateString();
        console.log("Fecha seleccionada:", formattedDate);
        

        // Llamada AJAX para obtener las rentas de la fecha seleccionada
        fetch(`/get-rentas/${formattedDate}`)
            .then(response => response.json())
            .then(data => updateEmployeeTable(data))
            .catch(error => console.error('Error:', error));
    }

    // Función para actualizar la tabla de rentas con los datos recibidos
    function updateEmployeeTable(rentas) {
        const tbody = document.querySelector("#tabla-empleados tbody");
        tbody.innerHTML = "";  // Limpiar tabla

        if (rentas.length === 0) {
            tbody.innerHTML = "<tr><td colspan='4'>No hay rentas para esta fecha</td></tr>";
        } else {
            rentas.forEach(renta => {
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td>${renta.nombre_empleado}</td>
                    <td>${renta.direccion}</td>
                    <td>${renta.estatus}</td>
                    <td><a href="#"><i class="bi bi-eye" title="Ver más detalles"></i></a></td>
                `;

                tbody.appendChild(row);
            });
        }
    }

    // Generar el calendario al cargar la página con la fecha de hoy
    generateCalendar(currentMonth, currentYear);
    </script>
    
    

    @include('fooder')
</body>
</html>
