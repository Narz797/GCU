const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

    $(document).ready(function() {
        // Fetch data using $.ajax
        $.ajax({
            url: '../backend/search_student.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const table = document.getElementById('data-table');
                const searchInput = document.getElementById('searchInput');

                function filterData() {
                    const searchTerm = searchInput.value.toLowerCase();

                    table.innerHTML = ''; // Clear existing table rows

                    data.forEach(row => {

                        if (
                            row.stud_user_id.toString().includes(searchTerm) ||
                            row.first_name.toLowerCase().includes(searchTerm) ||
                            row.last_name.toLowerCase().includes(searchTerm)
                        ) 
                        {
                        const newRow = table.insertRow();
                        newRow.classList.add('data-row');
    
                        // Create cells for other data fields
                        newRow.insertCell().textContent = row.stud_user_id;
                        newRow.insertCell().textContent = row.first_name;
                        newRow.insertCell().textContent = row.last_name;
                        newRow.insertCell().textContent = row.year_enrolled;
                        newRow.insertCell().textContent = row.course;
                        newRow.insertCell().textContent = row.gender;
                        newRow.insertCell().textContent = row.contact_no;
                        newRow.insertCell().textContent = row.email;
                        newRow.insertCell().textContent = row.service_requested;
                        newRow.insertCell().textContent = row.reason;
                        
                            

                        // Create a cell for the action button
                        const actionCell = newRow.insertCell();
                        const actionButton = document.createElement('button');
                        actionButton.textContent = 'View Details';
                        actionButton.addEventListener('click', () => {
                            window.location.href = 'new_page.php?id=' + row.stud_user_id;
                        });
                        actionCell.appendChild(actionButton);
                    }
                    });

                }

                searchInput.addEventListener('input', filterData);

                // Initial table population
                filterData();

                $('#table').DataTable({
                    dom: 'lrtip',
                    buttons: [
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            title: 'Student data',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            orientation: 'landscape',
                            title: 'Student data',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            orientation: 'landscape',
                            title: 'Student data',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        },
                        // JSON export doesn't have a built-in button, you can implement it manually
                    ]
                });

                //call design for buttons
                $('#toPDF').on('click', function() {
                    $('#table').DataTable().button('.buttons-pdf').trigger();
                });
            
                $('#toEXCEL').on('click', function() {
                    $('#table').DataTable().button('.buttons-excel').trigger();
                });
            
                $('#toCSV').on('click', function() {
                    $('#table').DataTable().button('.buttons-csv').trigger();
                });
            
                // JSON export implementation
                $('#toJSON').on('click', function() {
                    const jsonData = [
                        { id: 1, name: 'John' },
                        { id: 2, name: 'Jane' },
                        // ...
                    ];
                
                    // Convert JSON to a Blob
                    const jsonBlob = new Blob([JSON.stringify(jsonData)], { type: 'application/json' });
                
                    // Use FileSaver.js to trigger download
                    saveAs(jsonBlob, 'Student data.json'); // Specify the filename
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }

            
        });
    });

    //moving arrow

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {


        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


