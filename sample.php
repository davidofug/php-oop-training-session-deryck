
<?php
$mysqli = new mysqli("localhost", "root", "", "oop_php_training");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "INSERT INTO derrick_users(email) VALUES('davidwampamba@gmail.com')";
if (!$mysqli->query($sql)) {
    printf("Error message: %s\n", $mysqli->error);
}

/* close connection */
$mysqli->close();
?>
