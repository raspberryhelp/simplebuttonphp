<?php
session_start();

$connection = mysqli_connect("localhost", "root", '', "fatui");
$id = $_SESSION['usern'];
$sql = "SELECT adminrole FROM fatuipeople WHERE username = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s",$id);
$stmt->execute();
$result = $stmt->get_result();




if (isset($_SESSION['usern'])) {
    echo "\nSession username: " . $_SESSION['usern'];
} else {
    echo "Session username not set";
}

while($row = $result->fetch_assoc())
{
if($row["adminrole"] == "admin")
{
    echo "hello admin?";
    echo '<button onclick="document.location.href=\'Login.php\';" id="button">Go back to Login</button>';
    break;
}
}



?>

