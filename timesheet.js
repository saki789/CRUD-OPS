// timesheet.js

// Function to load Timesheet data
function loadTimesheetData() {
    // Make an AJAX request to fetch Timesheet data from timesheet.php
    fetch('timesheet.php')
        .then((response) => response.text())
        .then((data) => {
            // Inject the retrieved data into the timesheetTable element
            document.getElementById('timesheetTable').innerHTML = data;
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

// Function to handle the Timesheet form submission for creating and updating
function handleTimesheetForm() {
    const timesheetForm = document.getElementById('timesheetForm');

    timesheetForm.addEventListener('submit', (event) => {
        event.preventDefault();

        // Serialize the form data into a URL-encoded string
        const formData = new URLSearchParams(new FormData(timesheetForm));

        // Make an AJAX request to send the form data to timesheetupdate.php
        fetch('timesheetupdate.php', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.text())
            .then((data) => {
                // Display a success or error message
                document.getElementById('timesheetMessage').innerHTML = data;
                
                // Clear the form after submission
                timesheetForm.reset();

                // Reload Timesheet data after a successful submission
                loadTimesheetData();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });
}

// Call the loadTimesheetData and handleTimesheetForm functions when the page loads
window.onload = function () {
    loadTimesheetData();
    handleTimesheetForm();
};
