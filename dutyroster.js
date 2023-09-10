// script.js
document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch and update duty roster data
    function updateDutyRoster() {
        fetch("dutyroster.php")
            .then(response => response.text())
            .then(data => {
                // Update the duty roster table with the new data
                document.getElementById("dutyRosterTable").innerHTML = data;
            })
            .catch(error => console.error("Error fetching duty roster data: " + error));
    }

    // Call the update function initially
    updateDutyRoster();

    // You can set up a timer to refresh the data periodically
    setInterval(updateDutyRoster, 60000); // Refresh every 60 seconds (adjust as needed)
});
