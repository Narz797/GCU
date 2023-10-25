<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Basic styling for the calendar */
        .calendar {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            text-align: center;
            cursor: pointer; /* Add cursor pointer to indicate selectable elements */
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            padding: 5px;
        }

        /* Style for selected dates */
        .selected {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <title>Selectable Calendar</title>
</head>
<body>
    <div class="calendar">
        <h1 id="calendar-title"></h1>
        <table>
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody id="calendar-body">
                <!-- Calendar dates will be generated here -->
            </tbody>
        </table>
    </div>

    <script>
        function generateCalendar(year, month) {
            const calendarTitle = document.getElementById('calendar-title');
            const calendarBody = document.getElementById('calendar-body');
            calendarBody.innerHTML = '';

            // Set the calendar title
            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            calendarTitle.textContent = `${monthNames[month]} ${year}`;

            // Get the first day and last day of the month
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);

            // Create the calendar grid
            let currentDate = new Date(firstDay);
            while (currentDate <= lastDay) {
                const cell = document.createElement('td');
                cell.textContent = currentDate.getDate();
                cell.addEventListener('click', handleDateClick); // Add click event listener
                calendarBody.appendChild(cell);

                if (currentDate.getDay() === 6) {
                    calendarBody.appendChild(document.createElement('tr'));
                }

                currentDate.setDate(currentDate.getDate() + 1);
            }
        }

        function handleDateClick(event) {
            const selectedDate = event.target.textContent;
            
            // Remove the 'selected' class from all cells
            const cells = document.querySelectorAll('td');
            cells.forEach((cell) => {
                cell.classList.remove('selected');
            });

            // Add the 'selected' class to the clicked cell
            event.target.classList.add('selected');

            // You can now use the 'selectedDate' variable to perform further actions
            console.log('Selected Date:', selectedDate);
        }

        const today = new Date();
        generateCalendar(today.getFullYear(), today.getMonth());
    </script>
</body>
</html>
