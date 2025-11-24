<?php
// Database connection settings
$host = 'localhost'; // Your database host
$username = 'wagroup';  // Your database username
$password = 'mBxT0uX8pvW4JzwLvwEh';      // Your database password
$dbname = 'wagroup'; // Your database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //echo "test post";
    $input = $_POST['phone_numbers']; // Get phone numbers from input
    $phoneNumbers = array_map('trim', explode(',', $input)); // Split and trim input into an array

    $results = []; // Array to store the status of each phone number

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT COUNT(*) FROM contact WHERE mobile = ?");

    foreach ($phoneNumbers as $phoneNumber) {
        // Check if the phone number exists
        $stmt->bind_param("s", $phoneNumber);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        // Store the result
        if ($count > 0) {
            //$results[$phoneNumber] = "Exists in the database";
        } else {
            $results[$phoneNumber] = "Does NOT exist in the database";
        }
    }

    $stmt->close();
    $conn->close();

    // Display the results
    echo "<h3>Phone Number Check Results:</h3>";
    foreach ($results as $phone => $status) {
        echo "<b>$phone</b><br>";
    }
} else {
    // Display the input form
    echo '
    <form method="POST">
        <label for="phone_numbers">Enter phone numbers (separated by commas):</label><br>
        <textarea id="phone_numbers" name="phone_numbers" rows="5" cols="50"></textarea><br><br>
        <input type="submit" value="Check Numbers">
    </form>
    ';
}
?>
