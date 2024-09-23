<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ''; 
$dbname = "fatui";

// Initialize variables for user inputs
$usern = '';
$passkey = '';
$error = ''; // Initialize an error variable

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $usern = htmlspecialchars($_POST['username']);
    $passkey = htmlspecialchars($_POST['password']);

    // Create connection
    $connection = mysqli_connect("localhost", "root", 'Po$ter18PM', "fatui");

    // Check connection
    if(!$connection) {
        die("Could not connect: " . mysqli_connect_error());
    } else {
        // Prepare and execute the query securely
        $sql = "SELECT * FROM fatuipeople WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $usern);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any user is found
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify password
            if ($passkey === $row['passkey']) {
                // Store user information in session
                $_SESSION['usern'] = $row['username'];

                // Redirect to another page upon successful login
                header('Location: hi.php');
                exit();
            } else {
                $error = "Invalid password. Please try again.";
            }
        } else {
            $error = "User not found. Please check your username.";
        }

        // Close statement and connection
        $stmt->close();
        $connection->close();
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post">
    <label for="username">UTD ID</label>
    <input type="text" id="username" name="username" placeholder="Enter your UTD ID" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>

    <input type="submit" value="Log In">
</form>

<?php
// Display error message if any
if (!empty($error)) {
    echo '<p>' . $error . '</p>';
}
?>

</body>
</html>
