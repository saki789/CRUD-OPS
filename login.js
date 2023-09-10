<script>
    // Function to validate the login form
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "") {
            alert("Username and password are required fields.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
