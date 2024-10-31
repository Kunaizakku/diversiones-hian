<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->

    <title>Calendario</title>
    <style>
        .main-container {
            display: flex;
            width: 100%;
        }
        .calendar-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            margin-right: 10px;
        }
        .table-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
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
            color: #333;
        }
        .calendar-container button {
            background-color: #2E8B57;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
        }
        .calendar-container button:hover {
            background-color: #2E8B57;
        }
        .calendar-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .calendar-container th, .calendar-container td {
            padding: 15px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #e0e0e0;
            height: 50px;
        }
        .calendar-container thead th {
            background-color: #2E8B57;
            color: white;
            font-weight: bold;
        }
        .calendar-container tbody td {
            background-color: #f9f9f9;
            color: #333;
            transition: background-color 0.3s;
            border-radius: 5px;
        }
        .calendar-container tbody td:hover {
            background-color: #e9f4ff;
        }
        .calendar-container tbody td.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        #calendar-footer {
            margin-top: 20px;
        }
        #selectedDate {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            background-color: #f9f9f9;
        }
        @media (max-width: 768px) {
            .calendar-container table, .calendar-container th, .calendar-container td {
                font-size: 14px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include("sidebar")

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Éxito!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    </script>
    @endif

    <div class="main-container body-container">
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

        <div class="table-container">
            <h1>Rentas pendientes</h1>
            <br>
            <table id="tabla-empleados">
                <thead>
                    <tr>
                        <th>Fecha de entrega</th>
                        <th>Dirección</th>
                        <th>Teléfono Registrado</th>
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
        let selectedCell;

        function renderCalendar() {
            const month = date.getMonth();
            const year = date.getFullYear();
            const firstDay = new Date(year, month, 1);
            const totalDays = new Date(year, month + 1, 0).getDate();
            const lastDay = new Date(year, month, totalDays).getDay();

            calendar.innerHTML = '';
            let row = document.createElement('tr');
            for (let i = 0; i < firstDay.getDay(); i++) {
                let cell = document.createElement('td');
                row.appendChild(cell);
            }

            for (let day = 1; day <= totalDays; day++) {
                const cell = document.createElement('td');
                cell.textContent = day;
                cell.addEventListener('click', () => selectDate(day, cell));
                row.appendChild(cell);

                if ((firstDay.getDay() + day) % 7 === 0) {
                    calendar.appendChild(row);
                    row = document.createElement('tr');
                }
            }

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

            if (selectedCell) {
                selectedCell.classList.remove('active');
            }
            cell.classList.add('active');
            selectedCell = cell;

            fetch(`/get-rentas/${formattedDate}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.querySelector("#tabla-empleados tbody");
                    tableBody.innerHTML = '';

                    data.forEach(renta => {
                        const viewRentaUrl = `/renta/${renta.pk_rentas}`;
                        const row = `
                            <tr>
                                <td>${renta.fecha_entrega}</td>
                                <td>${renta.direccion}</td>
                                <td>${renta.celular}</td>
                                <td><a href="${viewRentaUrl}"><i class="bi bi-eye" title="Ver más detalles"></i></a></td>
                            </tr>`;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        function setTodayDate() {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const year = today.getFullYear();
            selectedDateInput.value = `${year}/${month}/${day}`;
        }

        prevMonthBtn.addEventListener('click', () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
        setTodayDate();
    </script>

    @include('fooder')
</body>
</html>
